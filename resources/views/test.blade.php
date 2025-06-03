<!DOCTYPE html>
<html>
<head>
    <title>Minha Localização</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style> #map { height: 100vh; } </style>
</head>
<body>
<div id="map"></div>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    const map = L.map('map').setView([0, 0], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19
    }).addTo(map);

    navigator.geolocation.watchPosition((pos) => {
        const { latitude, longitude } = pos.coords;
        map.setView([-30.033415862380984, -51.21098606777799], 16);
        L.marker([-30.033415862380984, -51.21098606777799]).addTo(map).bindPopup("<a href='google.com'>andrei </a>").openPopup();
    });
</script>
</body>
</html>
