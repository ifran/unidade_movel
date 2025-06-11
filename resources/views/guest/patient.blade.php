@include("layout.header")
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="/patient/save" method="POST">
                @csrf

                <!-- region UserRegister -->
                <div class="d-flex justify-content-center align-items-center">
                    <div class="collapse show w-50">
                        <div class="display-4">Cadastro de Usuário</div>
                        <div class="w-100 p-3" style="background-color: #eee;">
                            <div class="form-group">
                                <label for="name">Nome completo</label>
                                <input type="text" class="form-control" id="name"
                                       placeholder="Nome Sobrenome" name="name">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="text" class="form-control" id="email" name="email"
                                       placeholder="name@mail.com">
                            </div>
                            <div class="form-group">
                                <label for="password">Senha</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="***">
                            </div>
                            <div class="form-group">
                                <label for="phone">Telefone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                       placeholder="(xx) x xxxx-xxxx">
                            </div>
                            <div class="form-group">
                                <label for="document">CPF</label>
                                <input type="text" class="form-control" id="document" name="document"
                                       placeholder="xxx.xxx.xxx-xx  ">
                            </div>
                            <div class="w-100 p-3" style="background-color: #eee;">
                                <div class="form-group">
                                    <p>
                                        Declaro que estou ciente de que todas as informações fornecidas são verdadeiras,
                                        completas e refletem com precisão a realidade. Reconheço a importância da veracidade
                                        desses dados e assumo total responsabilidade por eles.
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Concluir" class="form-control" id="formGroupExampleInput2"
                                           placeholder="Another input">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- endRegion UserRegister -->
            </form>
        </div>
    </div>
</div>
@include("layout.footer")
