<script>
    navigator.geolocation.watchPosition((pos) => {
        const {latitude, longitude} = pos.coords;
        $.ajax({
            url: 'localization/save',
            type: 'POST',
            data: {
                lat: latitude,
                long: longitude
            },
            success: function (resposta) {
                console.log('Sucesso:', resposta);
            },
            error: function (erro) {
                console.log(document.getElementsByName("_token")[0].value);
                console.error('Erro:', erro);
            }
        });
    });
</script>
