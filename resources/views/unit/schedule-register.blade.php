<div class="modal fade" id="scheduleUnitModal" tabindex="-1" aria-labelledby="scheduleUnitModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <input type="hidden" id="agendaId">

        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title fs-1 text-center" id="scheduleUnitModalLabel">Agendar Disponibilidade</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form>
                        <div class="mb-3 row">
                            <label for="data_inicial" class="col-sm-2 col-form-label">Data Inicial</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="data_inicial" value="2025-06-03">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="data_final" class="col-sm-2 col-form-label">Data Final</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="data_final" value="2025-06-03">
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" id="endereco_dinamico" checked>
                            <label class="form-check-label" for="endereco_dinamico">
                                Endereço Dinâmico
                            </label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="cep" class="form-label">CEP</label>
                                <input type="text" class="form-control" id="cep" placeholder="xxxxx-xxx">
                            </div>
                            <div class="col-md-6">
                                <label for="cidade" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="cidade" placeholder="xxxxx-xxx">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="estado" class="form-label">Estado</label>
                                <input type="text" class="form-control" id="estado" placeholder="xxxxx-xxx">
                            </div>
                            <div class="col-md-6">
                                <label for="rua" class="form-label">Av/Rua</label>
                                <input type="text" class="form-control" id="rua" placeholder="xxxxx-xxx">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="bairro" class="form-label">Bairro</label>
                            <input type="text" class="form-control" id="bairro" placeholder="xxxxx-xxx">
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
    const exampleModal = document.getElementById('exampleModal');
    exampleModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');

        const inputId = exampleModal.querySelector('#agendaId');

        inputId.value = id;
    });
</script>
