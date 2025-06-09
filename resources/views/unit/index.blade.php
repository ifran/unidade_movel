@include("layout.header")
<div class="container-fluid mt-5">
    <h3>Unidades</h3>
    <a href="unit/form" class="btn btn-secondary mb-4">Criar unidade</a>

    <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
            <thead class="table-light">
            <tr>
                <th>Status</th>
                <th>Placa</th>
                <th>Especialização</th>
                <th>Disponibilidade</th>
                <th>Endereço Disponível</th>
                <th>Editar</th>
                <th>Criar Agenda</th>
                <th>Ver Agendamentos</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($units as $unit)
                <tr>
                    <td><?= $unit->unidade_status ?></td>
                    <td><?= $unit->unidade_placa ?></td>
                    <td><?= $unit->unidade_especializacao ?></td>
                    <td></td>
                    <td><?= $unit->unidade_endereco ?></td>
                    <td><a href="unit/form/<?=$unit->unidade_id?>">Editar</a></td>
                    <td>
                        <button type="button"
                                class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-id="<?= $unit->unidade_id ?>"
                                data-bs-target="#scheduleUnitModal">
                            Criar Agenda
                        </button>
                    </td>
                    <td>
                        <button type="button"
                                class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-id="<?= $unit->unidade_id ?>"
                                data-bs-target="#exampleModal">
                            Ver Agendamentos
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@include("unit.schedule-register")
@include("layout.footer")
