<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="https://www.svgrepo.com/show/111150/hotel.svg" width="40" height="40" alt="">
        </a>
        @auth
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class='nav'>
                    <li class='active'>Home</li>
                    <li>
                      <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Personal asset loans</a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                          <li><a href="#">asds</a></li>
                          <li class="divider"></li>
                        </ul>
                      </div>
                      </li>
                      <li>Payday loans</li>
                    <li>About</li>
                    <li>Contact</li>
                  </ul>

        </div>
    @else
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Iniciar sesión</a>
                </li>
            </ul>
        </div>
    @endauth

    </div>
</nav>
