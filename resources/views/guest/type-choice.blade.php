@include("layout.header")
<div class="d-flex justify-content-center align-items-center h-100">
    <div class="p-4 border rounded bg-white shadow" style="min-width: 300px;">
        <div class="form-group mb-3 text-center">
            <h4>Escolha seu tipo de cadastro</h4>
        </div>
        <div class="form-group">
            <a href="/register/admin" type="button" style="width: 10vw;" class="btn btn-primary btn-lg btn-block">Administrador</a>
            <a href="/register/patient" type="button" style="width: 10vw;" class="btn btn-primary btn-lg btn-block">Paciente</a>
        </div>
    </div>
</div>
@include("layout.footer")
