<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mapa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
    <style>
        #map {
            height: 100vh;
        }
    </style>
</head>
<body>
<div id="map"></div>

<script src="https://unpkg.com/leaflet"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

<script>
    const map = L.map('map').setView([0, 0], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
    let marker = null;

    // Atualiza localização no servidor e marcador
    function updatePosition(lat, lng) {
        console.log(lat + "," + lng);
        if (marker) marker.setLatLng([lat, lng]);
        else {
            marker = L.marker([lat, lng]).addTo(map);
            map.setView([lat, lng], 16); // Centraliza no início
        }

        // Envia para o servidor
        fetch('/location', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({lat, lng})
        });
    }

    // Ativa o rastreamento contínuo
    navigator.geolocation.watchPosition(
        (pos) => {
            const seconds = new Date().getSeconds();
            const {latitude, longitude} = pos.coords;
            updatePosition(latitude + seconds, longitude + seconds);
        },
        (err) => alert('Erro ao obter localização: ' + err.message),
        {enableHighAccuracy: true, maximumAge: 1000}
    );

    // Escuta localização de outros usuários
    window.Echo.channel('location').listen('LocationUpdated', (e) => {
        // Se quiser mostrar só os outros: compare com sua própria localização aqui
        console.log('Outro usuário:', e.lat, e.lng);
    });
</script>
</body>
</html>
