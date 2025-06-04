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
            <tr>
                <td>Ativo</td>
                <td>ABC123</td>
                <td>Odontologia</td>
                <td>02/06/2025 até 06/06/2025</td>
                <td>Av Voluntários 15, Porto Alegre</td>
                <td><input type="checkbox" class="form-check-input"></td>
                <td>
                    <button type="button"
                            class="btn btn-primary"
                            data-bs-toggle="modal"
                            data-id="123"
                            data-bs-target="#exampleModal">
                        Criar Agenda
                    </button>
                </td>
                <td><input type="checkbox" class="form-check-input"></td>
            </tr>
            <tr>
                <td>Inativo</td>
                <td>DEF456</td>
                <td>Geral</td>
                <td>02/06/2025 até 06/06/2025</td>
                <td>Av Borges de Medeiros, 15, Porto Alegre</td>
                <td>
                    <a href="unit/form/id">Editar</a>
                </td>
                <td>
                    <button type="button"
                            class="btn btn-primary"
                            data-bs-toggle="modal"
                            data-id="456"
                            data-bs-target="#exampleModal">
                        Criar Agenda
                    </button>
                </td>
                <td><input type="checkbox" class="form-check-input"></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

@include("unit.schedule-register")
@include("layout.footer")
