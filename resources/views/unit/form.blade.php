@include("layout.header")
<div class="container-fluid d-flex align-items-center h-100 justify-content-center">
    <div class="w-100" style="max-width: 700px;">
        <h2 class="text-center mb-4">Cadastrar Unidade</h2>
        <form>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Especialização</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="especializacao" placeholder="Vacinação">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Placa</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="placa" placeholder="XXX 123">
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-secondary">Concluir</button>
            </div>
        </form>
    </div>
</div>
@include("layout.footer")
