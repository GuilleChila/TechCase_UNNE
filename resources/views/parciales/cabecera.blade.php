<header class="cabecera">
    <div class="container-fluid">

        <!-- Parte superior -->
        <div class="d-flex justify-content-between align-items-center">
            <!-- Logo / título -->
            <div>
              <img src="{{ asset('img/logo techcase web.png') }}" alt="logo" class="logo">
                <h1>TechCase</h1>
                <small>Fundas y Accesorios para Celulares</small>
            </div>

            <!-- Botón login -->
            <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#loginModal">
                Iniciar sesión
            </button>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <nav class="navbar navbar-expand-lg navbar-light px-3 rounded">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('principal') }}">Principal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sobre-nosotros') }}">Sobre Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contacto') }}">contacto</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
</nav>
</header>