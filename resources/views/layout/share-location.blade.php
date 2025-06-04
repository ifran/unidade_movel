<div class="modal fade" id="shareLocation" tabindex="-1" aria-labelledby="shareLocationLabel" aria-hidden="true">
    <div class="modal-dialog">
        <input type="hidden" id="agendaId">

        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title fs-1 text-center" id="shareLocationLabel">Compartilhar Localização</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form>
                        <div class="mb-3">
                            <label for="bairro" class="form-label">Selecionar Unidade</label>
                            <select name="" id="" class="form-control" >
                                <option value="">-- Selecione --</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
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
