@include("layout.header")
<div class="container-fluid d-flex align-items-center h-100 justify-content-center">
    <div class="w-100" style="max-width: 700px;">
        <h2 class="text-center mb-4">Cadastrar Usuário</h2>
        <div class="w-100 p-3" style="background-color: #eee;">
            <div class="form-group">
                <label for="name">Nome completo</label>
                <input type="text" class="form-control" id="name"
                       placeholder="Nome Sobrenome" name="name">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" id="email"
                       placeholder="name@mail.com">
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password"
                       placeholder="***">
            </div>
            <div class="form-group">
                <label for="phone">Telefone</label>
                <input type="text" class="form-control" id="phone"
                       placeholder="(xx) x xxxx-xxxx">
            </div>
            <div class="form-group">
                <label for="document">CPF</label>
                <input type="text" class="form-control" id="document"
                       placeholder="xxx.xxx.xxx-xx  ">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-secondary">Concluir</button>
            </div>
        </div>
    </div>
</div>
@include("layout.footer")
