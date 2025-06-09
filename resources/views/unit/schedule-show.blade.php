<div class="modal fade" id="showSchedule" tabindex="-1" aria-labelledby="showScheduleLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title fs-4 text-center" id="showScheduleLabel">Agendamentos Marcados</h4>
            </div>

            <!-- content -->
            <div class="modal-body">
                <div class="container">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="table-light">
                            <tr>
                                <th>Status</th>
                                <th>Paciente</th>
                                <th>Data</th>
                                <th>Hora</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <select class="form-control sm">
                                        <option value="0">Aguardando Atendimento</option>
                                        <option value="0">Atendido</option>
                                        <option value="0">Não Compareceu</option>
                                    </select>
                                </td>
                                <td>Nome</td>
                                <td>Data</td>
                                <td>Hora</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script>
    const modal = document.getElementById('showSchedule');
    modal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const inputId = modal.querySelector('#unitId');

        inputId.value = id;
    });
</script>
