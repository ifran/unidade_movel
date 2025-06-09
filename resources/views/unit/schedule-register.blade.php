<div class="modal fade" id="scheduleUnitModal" tabindex="-1" aria-labelledby="scheduleUnitModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title fs-4 text-center" id="scheduleUnitModalLabel">Agendar Disponibilidade</h4>
            </div>
            <form action="schedule/save" method="POST">
                @csrf
                <input type="hidden" name="unitId" id="unitId">
                <div class="modal-body">
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="data_inicial" class="form-label">Data Inicial</label>
                                <input type="date" class="form-control" id="data_inicial" name="data_inicial">
                            </div>
                            <div class="col-md-6">
                                <label for="data_final" class="form-label">Data Final</label>
                                <input type="date" class="form-control" id="data_final" name="data_final">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="horario_ini" class="form-label">Horário de Abertura</label>
                                <input type="time" class="form-control" id="horario_ini" name="horario_ini">
                            </div>
                            <div class="col-md-6">
                                <label for="horario_fim" class="form-label">Horário de Encerramento</label>
                                <input type="time" class="form-control" id="horario_fim" name="horario_fim">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="cep" class="form-label">CEP</label>
                                <input type="text" class="form-control" id="cep" name="cep" placeholder="xxxxx-xxx">
                            </div>
                            <div class="col-md-6">
                                <label for="estado" class="form-label">Estado</label>
                                <input type="text" class="form-control" id="estado" name="estado"
                                       placeholder="xxxxx-xxx">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="cidade" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade"
                                       placeholder="xxxxx-xxx">
                            </div>
                            <div class="col-md-6">
                                <label for="bairro" class="form-label">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro"
                                       placeholder="xxxxx-xxx">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="rua" class="form-label">Av/Rua</label>
                            <input type="text" class="form-control" id="rua" name="rua" placeholder="xxxxx-xxx">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-primary" value="Criar Disponibilidade">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const modal = document.getElementById('scheduleUnitModal');
    modal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const inputId = modal.querySelector('#unitId');

        inputId.value = id;
    });
</script>
