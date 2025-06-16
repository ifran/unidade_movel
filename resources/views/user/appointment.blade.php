@include("layout.header")
<div class="container-fluid mt-5">
    <h3>Meus Agendamentos</h3>

    <div class="table-responsive">
        <table class="table table-bordered align-middle text-center" id="scheduleTable">
            <thead class="table-light">
            <tr>
                <th>Status</th>
                <th>Tipo</th>
                <th>Data</th>
                <th>Hora</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>
                        <select class="form-control sm" onchange="updateStatus(<?=$appointment->agendamento_id?>, this.value)">
                            <option <?= $appointment->status == 1 ? "selected" : "" ?>value="1">Aguardando Atendimento
                            </option>
                            <option <?= $appointment->status == 3 ? "selected" : "" ?> value="3">Cancelado</option>
                        </select>
                    </td>
                    <td><?= $appointment->unidade_especializacao ?? null ?></td>
                    <td><?= dateToShow($appointment->data) ?? null ?></td>
                    <td><?= $appointment->hora ?? null ?></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
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

@include("layout.footer")
