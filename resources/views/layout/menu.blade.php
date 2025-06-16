<header class="p-1" style="background-color: #e2f0ff;">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand btn btn-outline-primary me-2" href="/">Mapa da Saúde</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if (isLogged() && isAdmin())
                        <li class="nav-item">
                            <a href="/unit" class="nav-link btn btn-outline-primary me-2">Unidades Móveis</a>
                        </li>
                        <li class="nav-item">
                            <a href="/company" class="nav-link btn btn-outline-primary me-2">Dados da Empresa</a>
                        </li>
                        <li class="nav-item">
                            <a href="/user" class="nav-link btn btn-outline-primary me-2">Usuários</a>
                        </li>
                    @endif
                </ul>

                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 p-1">
                        @if (isLogged())
                            @if (isAdmin())
                                <li class="nav-item mb-1">
                                    @if (isSharingLocation())
                                        <a href="/user/location/share/stop" class="btn btn-danger me-2">Parar de Compartilhar Local</a>
                                    @else
                                        <button type="button" class="btn btn-primary me-2"
                                                data-bs-toggle="modal"
                                                data-bs-target="#shareLocation">
                                                 Compartilhar Localização
                                        </button>
                                    @endif
                                </li>
                            @endif
                            <li class="nav-item mb-1">
                                <a class="btn btn-light me-2" href="/user/appointment">Meus Agendamentos</a>
                            </li>
                            <li class="nav-item mb-1">
                                <a class="btn btn-light me-2" href="/user/account">Minha Conta</a>
                            </li>
                            <li class="nav-item mb-1">
                                <a class="btn btn-warning" href="/logout">Sair</a>
                            </li>
                        @else
                            <li class="nav-item mb-1">
                                <a class="btn btn-secondary me-2" href="/register/type">Criar Registro</a>
                            </li>
                            <li class="nav-item mb-1">
                                <a class="btn btn-dark" href="/login">Login</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>

@include("layout.share-location")
