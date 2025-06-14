@include("layout.header")
<div class="container-fluid mt-5">
    <h3>Meus Agendamentos</h3>

    <div class="table-responsive">
        <table class="table table-bordered align-middle text-center" id="scheduleTable">
            <thead class="table-light">
            <tr>
                <th>Status</th>
                <th>Data</th>
                <th>Hora</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>
                        <select class="form-control sm">
                            <option <?=$appointment->status == 1 ? "selected" : "" ?>value="0">Aguardando Atendimento</option>
                            <option <?=$appointment->status == 3 ? "selected" : ""  ?> value="0">Cancelar</option>
                        </select>
                    </td>
                    <td><?=$appointment->data ?? null?></td>
                    <td><?=$appointment->hora ?? null?></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@include("layout.footer")
