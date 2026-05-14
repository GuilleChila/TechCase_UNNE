<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechCase</title>
    <link href="{{ asset('vendor/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('parciales.cabecera')
    <main class="container my-4">
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
    <form method="POST" action="{{ route('login.post') }}" novalidate>
        @csrf

        <div class="mb-3">
            <label class="apple-label">Correo</label>
            <input type="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   class="form-control apple-input {{ $errors->has('email') ? 'apple-input-error' : '' }}" 
                   placeholder="nombre@ejemplo.com">
            
            @error('email')
                <span class="apple-error-text">
                    <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="apple-label">Contraseña</label>
            <input type="password" 
                   name="password" 
                   class="form-control apple-input {{ $errors->has('password') ? 'apple-input-error' : '' }}" 
                   placeholder="Mínimo 8 caracteres">
            
            @error('password')
                <span class="apple-error-text">
                    <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100 apple-btn">Ingresar</button>
    </form>

    <div class="text-center mt-3">
        <small class="apple-footer-text">
            ¿No tenés cuenta?
            <a href="#" class="apple-link" onclick="mostrarRegistro()">Registrarse</a>
        </small>
    </div>
</div>

        <!-- REGISTRO -->
        <div id="registerForm" style="display: none;">
    <form method="POST" action="{{ route('register.post') }}" novalidate>
        @csrf

        <!-- Nombre -->
        <div class="mb-3">
            <label class="apple-label">Nombre</label>
            <input type="text" 
                   name="name" 
                   value="{{ old('name') }}" 
                   class="form-control apple-input {{ $errors->has('name') ? 'apple-input-error' : '' }}" 
                   placeholder="Tu nombre completo">
            
            @error('name')
                <span class="apple-error-text">
                    <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                </span>
            @enderror
        </div>

        <!-- Documento -->
        <div class="mb-3">
            <label class="apple-label">Documento</label>
            <input type="text" 
                   name="documento" 
                   value="{{ old('documento') }}" 
                   class="form-control apple-input {{ $errors->has('documento') ? 'apple-input-error' : '' }}" 
                   placeholder="DNI o Pasaporte">
            
            @error('documento')
                <span class="apple-error-text">
                    <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                </span>
            @enderror
        </div>

        <!-- Correo -->
        <div class="mb-3">
            <label class="apple-label">Correo</label>
            <input type="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   class="form-control apple-input {{ $errors->has('email') ? 'apple-input-error' : '' }}" 
                   placeholder="nombre@ejemplo.com">
            
            @error('email')
                <span class="apple-error-text">
                    <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                </span>
            @enderror
        </div>

        <!-- Contraseña -->
        <div class="mb-3">
            <label class="apple-label">Contraseña</label>
            <input type="password" 
                   name="password" 
                   class="form-control apple-input {{ $errors->has('password') ? 'apple-input-error' : '' }}" 
                   placeholder="Mínimo 8 caracteres">
            
            @error('password')
                <span class="apple-error-text">
                    <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                </span>
            @enderror
        </div>

        <!-- Repetir Contraseña -->
        <div class="mb-3">
            <label class="apple-label">Repetir contraseña</label>
            <input type="password" 
                   name="password_confirmation" 
                   class="form-control apple-input" 
                   placeholder="Confirmá tu contraseña">
        </div>

        <button type="submit" class="btn btn-primary w-100 apple-btn">Registrarse</button>
    </form>

    <div class="text-center mt-3">
        <small class="apple-footer-text">
            ¿Ya tenés cuenta?
            <a href="#" class="apple-link" onclick="mostrarLogin()">Iniciar sesión</a>
        </small>
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
@if($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Reemplaza 'loginModal' por el ID real de tu modal
        var myModal = new bootstrap.Modal(document.getElementById('loginModal'));
        myModal.show();
    });
</script>
@endif
</body>
</html>