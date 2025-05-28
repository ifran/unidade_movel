<!DOCTYPE html>
<html>
<head>
    <title>Localização em Tempo Real</title>
</head>
<body>
<h1>Localização Atual:</h1>
<p>Latitude: <span id="lat">--</span></p>
<p>Longitude: <span id="lon">--</span></p>

<script>
    if ('geolocation' in navigator) {
        navigator.geolocation.watchPosition(
            function (position) {
                document.getElementById('lat').textContent = position.coords.latitude;
                document.getElementById('lon').textContent = position.coords.longitude;
            },
            function (error) {
                console.error('Erro ao obter localização:', error);
            },
            {
                enableHighAccuracy: true,
                maximumAge: 0
            }
        );
    } else {
        alert('Geolocalização não suportada pelo navegador.');
    }
</script>
</body>
</html>
