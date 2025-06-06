@include("layout.header")
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="/admin/save" method="POST">
                @csrf
                <!-- region Stepper -->
                <div class="container-fluid p-2 align-items-center">
                    <div class="d-flex justify-content-around">
                        <button
                            type="button"
                            class="btn finished text-white btn-sm rounded-pill"
                            data-bs-toggle="collapse"
                            id="button1"
                            data-bs-target="#company1"
                            aria-expanded="true"
                            aria-controls="company1"
                            onclick="stepFunction(event); changeColor(1);">
                            Usuário
                        </button>
                        <span
                            class="not-finished w-25 rounded mt-auto mb-auto me-1 ms-1"
                            style="height: 0.2rem" id="line1"></span>
                        <button
                            class="btn not-finished text-white btn-sm rounded-pill"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#company2"
                            id="button2"
                            aria-expanded="false"
                            aria-controls="company3"
                            onclick="stepFunction(event); changeColor(2);">
                            Empresa
                        </button>
                        <span
                            class="not-finished w-25 rounded mt-auto mb-auto me-1 ms-1"
                            style="height: 0.2rem" id="line2"></span>
                        <button
                            class="btn not-finished text-white btn-sm rounded-pill"
                            type="button"
                            data-bs-toggle="collapse"
                            id="button3"
                            data-bs-target="#company3"
                            aria-expanded="false"
                            aria-controls="company3"
                            onclick="stepFunction(event); changeColor(3);">
                            Finalizar
                        </button>
                    </div>
                </div>
                <!-- endRegion Stepper -->

                <!-- region UserRegister -->
                <div class="d-flex justify-content-center align-items-center">
                    <div class="collapse show w-50" id="company1">
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
                        </div>
                    </div>
                </div>
                <!-- endRegion UserRegister -->

                <!-- region CompanyRegister -->
                <div class="d-flex justify-content-center align-items-center">
                    <div class="collapse w-50" id="company2">
                        <div class="display-4">Cadastrar Empresa</div>
                        <div class="w-100 p-3" style="background-color: #eee;">
                            <div class="form-group">
                                <label for="companyDocument">CNPJ</label>
                                <input type="text" class="form-control" id="companyDocument" name="companyDocument"
                                       placeholder="xx.xxx.xxx/xxxx-xx">
                            </div>
                            <div class="form-group">
                                <label for="companyName">Razão Social</label>
                                <input type="text" class="form-control" name="companyName" id="companyName"
                                       placeholder="Razão Social">
                            </div>
                            <div class="form-group">
                                <label for="companyNameSecondary">Nome Fantasia</label>
                                <input type="text" class="form-control" name="companyNameSecondary"
                                       id="companyNameSecondary"
                                       placeholder="Razão Social">
                            </div>
                            <div class="form-group">
                                <label for="address">Endereço</label>
                                <input type="text" class="form-control" name="address" id="address"
                                       placeholder="Av. ">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- endRegion CompanyRegister -->

                <!-- region Finish -->
                <div class="d-flex justify-content-center align-items-center">
                    <div class="collapse w-50" id="company3">
                        <div class="display-4">Finalizar</div>
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
                <!-- endRegion Finish -->
            </form>
        </div>
    </div>
</div>
<script>
    function stepFunction(event) {
        var element = document.getElementsByClassName("collapse");
        for (var i = 0; i < element.length; i++) {
            event.target.style.bgColor = "black";
            if (element[i] !== event.target.ariaControls) {
                element[i].classList.remove("show");
            }
        }
    }

    function changeColor(button) {
        if (button == 1) {
            document.getElementById("line1").classList.add('not-finished');
            document.getElementById("line1").classList.remove('finished');

            document.getElementById("button2").classList.add('not-finished');
            document.getElementById("button2").classList.remove('finished');

            document.getElementById("line2").classList.add('not-finished');
            document.getElementById("line2").classList.remove('finished');

            document.getElementById("button3").classList.add('not-finished');
            document.getElementById("button3").classList.remove('finished');
        } else if (button == 2) {
            document.getElementById("button2").classList.add('finished');
            document.getElementById("line1").classList.add('finished');

            document.getElementById("button3").classList.add('not-finished');
            document.getElementById("button3").classList.remove('finished');

            document.getElementById("line2").classList.add('not-finished');
            document.getElementById("line2").classList.remove('finished');
        } else if (button == 3) {
            document.getElementById("line1").classList.remove('not-finished');
            document.getElementById("line1").classList.add('finished');

            document.getElementById("button2").classList.add('finished');
            document.getElementById("line2").classList.add('finished');

            document.getElementById("button3").classList.add('finished');
            document.getElementById("line3").classList.add('finished');
        }
    }
</script>
<style>
    .not-finished {
        background-color: #b2b2b2;
    }

    .finished {
        background-color: #009795;
    }
</style>
<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
    crossorigin="anonymous"></script>
@include("layout.footer")
