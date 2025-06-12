<header class="p-3 bg-light">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="/">Mapa da Saúde</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse w-100 text-center" id="navbarContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-5">
                    @if (isLogged())
                        <li class="nav-item">
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

                <div class="d-flex">
                    @if (isLogged())
                        <button type="button" class="btn btn-primary me-2"
                                data-bs-toggle="modal" data-id="456"
                                data-bs-target="#shareLocation">
                            Compartilhar Localização
                        </button>
                        <a class="btn btn-outline-secondary me-2" href="/user/account">Minha Conta</a>
                        <a class="btn btn-warning" href="/logout">Sair</a>
                    @else
                        <a class="btn btn-outline-secondary me-2" href="/register/type">Criar Registro</a>
                        <a class="btn btn-warning" href="/login">Login</a>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</header>


@include("layout.share-location")
