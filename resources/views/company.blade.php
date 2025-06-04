@include("layout.header")
<div class="container-fluid d-flex align-items-center h-100 justify-content-center">
    <div class="w-100" style="max-width: 700px;">
        <h2 class="text-center mb-4">Dados da Empresa</h2>
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
                <input type="text" class="form-control" name="companyNameSecondary" id="companyNameSecondary"
                       placeholder="Razão Social">
            </div>
            <div class="form-group">
                <label for="address">Endereço</label>
                <input type="text" class="form-control" name="address" id="address"
                       placeholder="Av. ">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-secondary">Concluir</button>
            </div>
        </div>
    </div>
</div>
@include("layout.footer")
