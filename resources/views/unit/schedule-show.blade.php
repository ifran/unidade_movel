<!-- Loading overlay -->
<div id="loading" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%;
    background:rgba(0,0,0,0.5); color:white; font-size:2em; text-align:center; padding-top:20%; z-index: 9999;  ">
    Carregando...
</div>

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
                        <table class="table table-bordered align-middle text-center" id="scheduleTable">
                            <thead class="table-light">
                            <tr>
                                <th>Status</th>
                                <th>Paciente</th>
                                <th>Data</th>
                                <th>Hora</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr id="none">
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
    const scheduleModal = document.getElementById('showSchedule');
    scheduleModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');

        // Limpa a tabela antes de carregar novamente
        const tableBody = scheduleModal.querySelector('#scheduleTable tbody');
        tableBody.innerHTML = 'Buscando dados...';

        fetch(`/unit/schedules/appointments/${id}`)
            .then(response => response.json())
            .then(data => {
                tableBody.innerHTML = '';

                console.log(data.data);
                if (data.data.length > 0) {
                    data.data.forEach(schedule => {
                        const row = document.createElement('tr');

                        row.innerHTML = `
                        <td>
                            <select class="form-control sm" id="selectStatus" onchange="updateStatus(` + schedule.id + `, this.value)">
                                <option ` + (schedule.status === 1 ? ` selected ` : ``) + ` value="1">Aguardando Atendimento</option>
                                <option ` + (schedule.status === 2 ? ` selected ` : ``) + ` value="2">Atendido</option>
                                <option ` + (schedule.status === 3 ? ` selected ` : ``) + ` value="3">Não Compareceu</option>
                            </select>
                        </td>
                        <td>${schedule.patientName}</td>
                        <td>${schedule.date}</td>
                        <td>${schedule.time}</td>
                    `;
                        tableBody.appendChild(row);
                    });
                } else {
                    tableBody.innerHTML = "Sem dados no momento";
                }
            })
            .catch(error => {
                console.error('Erro ao carregar agendamentos:', error);
            });
    });

    function updateStatus(appointmentId, statusId) {
        const loading = document.getElementById('loading');
        loading.style.display = 'block';

        fetch('/appointment/status/' + appointmentId + '/' + statusId, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // se Laravel
            },
            body: JSON.stringify({ativado: this.checked})
        })
            .then(response => response.json())
            .then(data => {
                console.log('Sucesso:', data);
            })
            .catch(error => {
                console.error('Erro:', error);
            })
            .finally(() => {
                loading.style.display = 'none';
            });
    }
</script>
