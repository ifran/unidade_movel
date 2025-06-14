@include("layout.header")
<div class="container-fluid d-flex align-items-center h-100 justify-content-center">
    <div class="w-100" style="max-width: 700px;">
        <form action="/user/account" method="post">
            @csrf
            <h2 class="text-center mb-4"><?= isset($userInformation) && $userInformation->usuario_id !== null ? "Editar Usuário" : "Cadastrar Usuário" ?></h2>
            <div class="w-100 p-3" style="background-color: #eee;">
                <div class="form-group">
                    <label for="name">Nome completo</label>
                    <input type="text" class="form-control" id="name"
                           placeholder="Nome Sobrenome" name="name"
                           value="<?=$userInformation->usuario_nome ?? null?>">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" id="email"
                           placeholder="name@mail.com" name="email"
                           value="<?=$userInformation->usuario_email ?? null?>">
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" id="password"
                           value="<?=$userInformation->usuario_senha ?? null?>"
                           placeholder="****" name="password">
                </div>
                <div class="form-group">
                    <label for="phone">Telefone</label>
                    <input type="text" class="form-control" id="phone"
                           placeholder="(xx) x xxxx-xxxx" name="phone"
                           value="<?=$userInformation->usuario_telefone ?? null?>">
                </div>
                <div class="form-group">
                    <label for="document">CPF</label>
                    <input type="text" class="form-control" id="document"
                           placeholder="xxx.xxx.xxx-xx  " name="document"
                           value="<?=$userInformation->usuario_cpf ?? null?>">
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-secondary" value="Concluir">
                </div>
            </div>
        </form>
    </div>
</div>
@include("layout.footer")
