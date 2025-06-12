<header class="p-3">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="/">Mapa da Saúde</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if (isLogged() && isAdmin())
                        <li class="nav-item">
                            <a href="/unit" class="nav-link">Unidades Móveis</a>
                        </li>
                        <li class="nav-item">
                            <a href="/company" class="nav-link">Dados da Empresa</a>
                        </li>
                        <li class="nav-item">
                            <a href="/user" class="nav-link">Usuários</a>
                        </li>
                    @endif
                </ul>

                <div class="d-flex">
                    @if (isLogged())
                        @if (isAdmin())
                            <button type="button" class="btn btn-primary me-2"
                                    data-bs-toggle="modal" data-id="456"
                                    data-bs-target="#shareLocation">
                                Compartilhar Localização
                            </button>
                        @endif

                        <a class="btn btn-warning me-2" href="/user/appointment">Meus Agendamentos</a>
                        <a class="btn btn-warning me-2" href="/user/account">Minha Conta</a>
                        <a class="btn btn-warning" href="/logout">Sair</a>
                    @else
                        <a class="btn btn-warning me-2" href="/register/type">Criar Registro</a>
                        <a class="btn btn-warning" href="/login">Login</a>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</header>

@include("layout.share-location")
