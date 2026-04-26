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
            
            <nav class="navbar navbar-expand-lg p-0">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('principal') }}">Principal</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('catalogo') }}">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('sobre-nosotros') }}">Sobre Nosotros</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Categorías</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('catalogo-fundas') }}">Fundas</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
</header>