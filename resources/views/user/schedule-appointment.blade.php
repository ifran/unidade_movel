@include("layout.header")
<div class="container-fluid mt-5">
    <h3>Unidades</h3>
    <a href="unit/form" class="btn btn-secondary mb-4">Criar unidade</a>

    <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
            <thead class="table-light">
            <tr>
                <th>Status</th>
                <th>Nome</th>
                <th>Placa</th>
                <th>Especialização</th>
                <th>Disponibilidade</th>
                <th>Editar</th>
                <th>Criar Agenda</th>
                <th>Ver Agendamentos</th>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td>

                    </td>
                    <td><a href="unit/form/">Editar</a></td>
                    <td>
                        <button type="button"
                                class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-id=" "
                                data-bs-target="#scheduleUnitModal">
                            Criar Agenda
                        </button>
                    </td>
                    <td>
                        <button type="button"
                                class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-id=" "
                                data-bs-target="#showSchedule">
                            Ver Agendamentos
                        </button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@include("layout.footer")
