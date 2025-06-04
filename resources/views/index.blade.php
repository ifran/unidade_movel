@include("layout.header")
<div id="map"></div>
<script>
    const map = L.map('map').setView([0, 0], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19
    }).addTo(map);

    var redIcon = L.icon({
        iconUrl: 'https://maps.google.com/mapfiles/ms/icons/red-dot.png',
        iconSize: [32, 32],
        iconAnchor: [16, 32],
        popupAnchor: [0, -32]
    });

    const allMarkers = L.featureGroup().addTo(map);
    let myMarker = null;

    navigator.geolocation.watchPosition((pos) => {
        const {latitude, longitude} = pos.coords;

        if (myMarker) {
            allMarkers.removeLayer(myMarker);
        }

        myMarker = L.marker([latitude, longitude], {icon: redIcon})
            .addTo(allMarkers)
            .bindPopup("Você está aqui")
            .openPopup();

        map.fitBounds(allMarkers.getBounds());
    });

    setInterval(function () {
        $.ajax({
            url: 'localization/all',
            type: 'GET',
            success: function (resposta) {
                allMarkers.eachLayer((layer) => {
                    if (layer._latlng !== myMarker._latlng) {
                        allMarkers.removeLayer(layer);
                    }
                });

                if (resposta.data.length > 0) {
                    for (i = 0; i < resposta.data.length; i++) {
                        info = resposta.data[i];

                        L.marker([info.latitude, info.longitude])
                            .addTo(allMarkers)
                            .bindPopup("<a href='google.com'>" + info.description + "</a>");
                    }

                    map.fitBounds(allMarkers.getBounds());
                }
            },
            error: function (erro) {
                console.log(document.getElementsByName("_token")[0].value);
                console.error('Erro:', erro);
            }
        });
    }, 5000);

</script>
@include("layout.footer")
