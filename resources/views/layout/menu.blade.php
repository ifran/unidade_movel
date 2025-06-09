<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/">Mapa da Saúde</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            @if (isLogged())
                <li class="nav-item active">
                    <a class="nav-link" href="/unit">Unidades Móveis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/company">Dados da Empresa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user">Usuários</a>
                </li>
            @endif
        </ul>

        <form class="d-flex my-2 my-lg-0">
            @if (isLogged())
                <div class="nav-item me-2">
                    <button type="button" class="btn btn-primary"
                            data-bs-toggle="modal" data-id="456"
                            data-bs-target="#shareLocation">
                        Compartilhar Localização
                    </button>
                </div>
                <div class="nav-item me-2">
                    <a class="nav-link" href="/user/account">Minha Conta</a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="/logout">Sair</a>
                </div>
            @else
                <div class="nav-item me-2">
                    <a class="nav-link" href="/register/type">Criar Registro</a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </div>
            @endif
        </form>
    </div>
</nav>
@include("layout.share-location")
