<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/">Mapa da Saúde</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            @if (isLogged())
                <li class="nav-item active">
                    <a class="nav-link" href="/unit">Unidades Móveis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/company">Dados da Empresa</a>
                </li>
            @endif
        </ul>
        <form class="form-inline my-2 my-lg-0">
            @if (isLogged())
                <div class="nav-item">
                    <a class="nav-link disabled" href="/user">Minha Conta</a>
                </div>
                <div class="nav-item">
                    <a class="nav-link disabled" href="/logout">Sair</a>
                </div>
            @else
                <div class="nav-item">
                    <a class="nav-link disabled" href="/register/type">Criar Registro</a>
                </div>
                <div class="nav-item">
                    <a class="nav-link disabled" href="/login">Login</a>
                </div>
            @endif
        </form>
    </div>
</nav>
