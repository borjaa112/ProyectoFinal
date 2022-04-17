<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('inicio') }}"><img src="{{asset('imgs/logo.svg')}}"
                width="40" height="40" alt="">Inicio
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @auth
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"> Mi cuenta </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('cuenta')}}">Mi perfil</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                        onclick="event.preventDefault();this.closest('form').submit();">Salir</a>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        @else
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
            </div>
        @endauth

    </div>
</nav>
