<header>
    <nav class="navbar navbar-light navbar-expand-md bg-faded justify-content-center">
            <a href="/" class="navbar-brand d-flex w-50 mr-auto"><img class="img-responsive" src="img/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
                    <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
                    <!-- <ul class="navbar-nav w-100 justify-content-center">
                            <li class="nav-item active">
                                    <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="//codeply.com">Codeply</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="#">Link</a>
                            </li>
                    </ul> -->
                    <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
                            <li class="nav-item">
                                    <a class="nav-link nav-bar" href="{{ route('login') }}">Soy consultor</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link nav-bar" href="{{ route('login') }}">Iniciar sesión</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link register" href="{{ route('register') }}">Registrate</a>
                            </li>
                    </ul>
            </div>
    </nav>
</header>