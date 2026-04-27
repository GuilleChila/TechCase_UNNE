<header class="cabecera">
    <div class="container-fluid cabecera-grid">
        
        <div class="area-logo">
            <a href="{{ route('principal') }}">
                <img src="{{ asset('img/logo_transparent.png') }}" alt="logo" class="logo">
            </a>
        </div>

        <div class="area-busqueda">
            <form action="#" method="GET" class="search-container">
                <input type="text" name="query" placeholder="Buscar productos" class="search-input">
                <button type="submit" class="search-icon">
                    <i class="bi bi-search"></i> 
                </button>
            </form>
        </div>

        <div class="area-derecha">
            <div class="boton-login">
                <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Iniciar sesión
                </button>
            </div>
            
            <nav class="navbar navbar-expand-lg navbar-dark p-0">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('principal') }}">Principal</a></li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Productos</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('catalogo-fundas') }}">Fundas</a></li>
                        <li><a class="dropdown-item" href="{{ route('catalogo-cargadores') }}">Cargadores</a></li>
                        <li><a class="dropdown-item" href="{{ route('catalogo-ComeCables') }}">ComeCables</a></li>
                    </ul>
                </li>
                <li class="nav-item d-flex align-items-center ms-lg-3">
                    <a class="nav-link position-relative" href="{{ route('carrito') }}">
                      <i class="bi bi-cart3" style="font-size: 1.2rem; color: white;"></i>
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">
                       1
                      </span>
                      </a>
                  </li>
                
                <li class="nav-item"><a class="nav-link" href="{{ route('sobre-nosotros') }}">Somos TechCase</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('preguntas frecuentes') }}">Q&A</a></li>
            </ul>
        </div>
    </div>
</nav>
        </div>

    </div>
</header>