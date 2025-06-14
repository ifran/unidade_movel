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
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td><?=$user->usuario_nome?></td>
                    <td><?=$user->usuario_email?></td>
                    <td><?=$user->usuario_cpf?></td>
                    <td><?=$user->usuario_telefone?></td>
                    <td><?=$user->unidade_nome?></td>
                    <td><a href="/user/form/<?=$user->usuario_id?>">Editar</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@include("unit.schedule-register")
@include("layout.footer")
