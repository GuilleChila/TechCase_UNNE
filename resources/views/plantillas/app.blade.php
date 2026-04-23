<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechCase</title>
    <link href="{{ asset('vendor/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    @include('parciales.cabecera')
    <main class="my-4">
    @yield('content')
    </main>
    @include('parciales.pie-pagina')
    <div class="modal fade" id="loginModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- HEADER -->
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Iniciar sesión</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- BODY -->
      <div class="modal-body">

        <!-- LOGIN -->
        <div id="loginForm">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
              <label>Correo</label>
              <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
              <label>Contraseña</label>
              <input type="password" name="password" class="form-control" required>
            </div>

            <button class="btn btn-primary w-100">Ingresar</button>
          </form>

          <div class="text-center mt-3">
            <small>
              ¿No tenés cuenta?
              <a href="#" onclick="mostrarRegistro()">Registrarse</a>
            </small>
          </div>
        </div>

        <!-- REGISTRO -->
        <div id="registerForm" style="display: none;">
          <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-2">
              <label>Nombre</label>
              <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-2">
              <label>Documento</label>
              <input type="text" name="documento" class="form-control" required>
            </div>

            <div class="mb-2">
              <label>Correo</label>
              <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-2">
              <label>Contraseña</label>
              <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
              <label>Repetir contraseña</label>
              <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button class="btn btn-success w-100">Registrarse</button>
          </form>

          <div class="text-center mt-3">
            <small>
              ¿Ya tenés cuenta?
              <a href="#" onclick="mostrarLogin()">Iniciar sesión</a>
            </small>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
    <script src="{{ asset('vendor/js/bootstrap.bundle.min.js') }}"></script>
    <script>
function mostrarRegistro() {
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('registerForm').style.display = 'block';
    document.getElementById('modalTitle').innerText = 'Registrarse';
}

function mostrarLogin() {
    document.getElementById('loginForm').style.display = 'block';
    document.getElementById('registerForm').style.display = 'none';
    document.getElementById('modalTitle').innerText = 'Iniciar sesión';
}
</script>
</body>
</html>