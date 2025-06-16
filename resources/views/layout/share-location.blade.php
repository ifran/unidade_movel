<div class="modal fade" id="shareLocation" tabindex="-1" aria-labelledby="shareLocationLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="user/location/share" method="POST">
                @csrf
                <div class="modal-header justify-content-center">
                    <h4 class="modal-title fs-3 text-center" id="shareLocationLabel">Compartilhar Localização</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="mb-3">
                            <label for="bairro" class="form-label">Selecionar Unidade</label>
                            <select name="userUnitId" id="userUnitId" class="form-control">
                                <option>--- Selecione ---</option>
                                @foreach ($unitsLocations as $unitsLocation)
                                    <option <?= (session()->get("unitId") !== null && session()->get("unitId") == $unitsLocation->unidade_id ? "selected" : "") ?> value="<?=$unitsLocation->unidade_id?>">
                                            <?= $unitsLocation->unidade_nome . " - " . $unitsLocation->unidade_especializacao ?>
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-primary" value="Salvar">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const shareLocation = document.getElementById('shareLocation');
    shareLocation.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');

        const inputId = shareLocation.querySelector('#agendaId');

        inputId.value = id;
    });
</script>
