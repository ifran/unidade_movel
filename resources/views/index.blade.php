@include("layout.header")
<div id="map" style="position: relative;">
    <div id="recenter-btn">Recentralizar</div>
</div>
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
    let firstUser = true;
    let firstUnits = true;

    navigator.geolocation.watchPosition((pos) => {
        const {latitude, longitude} = pos.coords;

        if (myMarker) {
            allMarkers.removeLayer(myMarker);
        }

        myMarker = L.marker([latitude, longitude], {icon: redIcon})
            .addTo(allMarkers)
            .bindPopup("Você está aqui")
            .openPopup();

        if (firstUser) {
            map.fitBounds(allMarkers.getBounds());
            firstUser = false;
        }
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
                            .bindPopup("<a href='/unit/schedule/" + info.unitId + "' >" + info.description + "</a>");
                    }

                    if (firstUnits) {
                        map.fitBounds(allMarkers.getBounds());
                        firstUnits = false;
                    }
                }
            },
            error: function (erro) {
                console.log(document.getElementsByName("_token")[0].value);
                console.error('Erro:', erro);
            }
        });
    }, 5000);

</script>
<style>
    #recenter-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 1000;
        background: white;
        border: 1px solid #ccc;
        border-radius: 50%;
        padding: 10px;
        cursor: pointer;
        font-weight: bold;
        box-shadow: 0 2px 6px rgba(0,0,0,0.3);
    }
</style>
<script>
    document.getElementById('recenter-btn').addEventListener('click', () => {
        if (allMarkers.getLayers().length > 0) {
            map.fitBounds(allMarkers.getBounds());
        }
    });
</script>
@include("layout.footer")
