@include("layout.header")
<div class="container-fluid mt-5">
    <h3>Usuários</h3>
    <a href="user/form" class="btn btn-secondary mb-4">Criar Usuário</a>

    <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
            <thead class="table-light">
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Documento</th>
                <th>Telefone</th>
                <th>Unidade Associada</th>
                <th>Editar</th>
                <th>Ver Agendamentos</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Nome</td>
                <td>E-mail</td>
                <td>Documento</td>
                <td>Telefone</td>
                <td>Unidade Associada</td>
                <td>Editar</td>
                <td>Ver Agendamentos</td>
            </tr>
            <tr>
                <td>Nome</td>
                <td>E-mail</td>
                <td>Documento</td>
                <td>Telefone</td>
                <td>Unidade Associada</td>
                <td>Editar</td>
                <td>Ver Agendamentos</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@include("unit.schedule-register")
@include("layout.footer")
