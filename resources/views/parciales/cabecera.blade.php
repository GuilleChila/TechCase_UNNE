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
            
            @guest
                <div class="boton-login">
                    <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Iniciar sesión
                    </button>
                </div>
            @endguest

            @auth
                <div class="perfil-usuario-logeado">
                    <span class="nombre-usuario">
                        {{ explode(' ', trim(Auth::user()->nombre))[0] }}
                    </span>

                    <button type="button" class="btn-apple-logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Cerrar sesión">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon-power">
                            <path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
                            <line x1="12" y1="2" x2="12" y2="12"></line>
                        </svg>
                    </button>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            @endauth
            
            <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="{{ route('principal') }}">Principal</a></li>
                            @auth
                            @if(Auth::user()->perfil_id === 2)
                                <li class="nav-item animate-pulse">
                                    <a class="nav-link" href="{{ route('admin.dashboard') }}" style="color: #f9edb9; font-weight: 600;">
                                        <i class="bi bi-shield-lock-fill me-1"></i> Admin Panel
                                    </a>
                                </li>
                            @endauth
                            @endif
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
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">1</span>
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