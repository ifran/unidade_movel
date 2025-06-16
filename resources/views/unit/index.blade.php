@include("layout.header")
<div class="container-fluid mt-5">
    <h3>Unidades</h3>
    <a href="unit/form" class="btn btn-secondary mb-4">Criar unidade</a>
    <div>
        @if(session('error'))
            <hr>
            <div class="alert alert-danger" role="alert">
                    <?= session('error') ?>
            </div>
        @endif
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
            <thead class="table-light">
            <tr>
                <th>Nome</th>
                <th>Placa</th>
                <th>Especialização</th>
                <th>Disponibilidade</th>
                <th>Criar Agenda</th>
                <th>Ver Agendamentos</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($units as $unit)
                <tr>
                    <td><?= $unit->unidade_nome ?></td>
                    <td><?= $unit->unidade_placa ?></td>
                    <td><?= $unit->unidade_especializacao ?></td>
                    <td>
                        @if (!empty($schedules[$unit->unidade_id]) && is_array($schedules[$unit->unidade_id]))
                            @for ($i = 0; $i < count($schedules[$unit->unidade_id]); $i++)
                                <p><?= $schedules[$unit->unidade_id][$i]["info"] ?> -
                                    <a href="schedule/delete/<?=$schedules[$unit->unidade_id][$i]["scheduleId"]?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor"
                                             class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>
                                    </a>
                                </p>
                            @endfor
                        @endif
                    </td>
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
                                data-bs-target="#showSchedule">
                            Ver Agendamentos
                        </button>
                    </td>
                    <td><a href="/unit/form/<?=$unit->unidade_id?>">Editar</a></td>
                    <td>
                        <a href="/unit/delete/<?=$unit->unidade_id?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                 fill="currentColor"
                                 class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@include("unit.schedule-register")
@include("unit.schedule-show")
@include("layout.footer")
