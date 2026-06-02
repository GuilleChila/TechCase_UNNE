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
 <div class="modal fade {{ $errors->any() ? 'show' : '' }}" id="loginModal" tabindex="-1" style="{{ $errors->any() ? 'display: block;' : '' }}">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">
          {{ $errors->has('name') || $errors->has('documento') ? 'Crear cuenta' : 'Iniciar sesión' }}
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="document.getElementById('loginModal').style.display='none'"></button>
      </div>

      <div class="modal-body">
        
        @if(session('success'))
            <div class="alert alert-success d-flex align-items-center mb-3) apple-alert" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        <div id="loginForm" style="display: {{ $errors->has('name') || $errors->has('documento') ? 'none' : 'block' }};">
            <form method="POST" action="{{ route('login.post') }}" novalidate>
                @csrf

                <div class="mb-3">
                    <label class="apple-label">Correo</label>
                    <input type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           class="form-control apple-input {{ $errors->has('email') && !$errors->has('name') ? 'apple-input-error' : '' }}" 
                           placeholder="nombre@ejemplo.com">
                    
                    @if($errors->has('email') && !$errors->has('name'))
                        <span class="apple-error-text">
                            <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $errors->first('email') }}
                        </span>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="apple-label">Contraseña</label>
                    <input type="password" 
                           name="password" 
                           class="form-control apple-input {{ $errors->has('password') && !$errors->has('name') ? 'apple-input-error' : '' }}" 
                           placeholder="Mínimo 8 caracteres">
                    
                    @if($errors->has('password') && !$errors->has('name'))
                        <span class="apple-error-text">
                            <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $errors->first('password') }}
                        </span>
                    @endif
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

        <div id="registerForm" style="display: {{ $errors->has('name') || $errors->has('documento') ? 'block' : 'none' }};">
            <form method="POST" action="{{ route('register.post') }}" novalidate>
                @csrf

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

                <div class="mb-3">
                    <label class="apple-label">Correo</label>
                    <input type="email" 
                           name="email" 
                           value="{{ old('name') ? old('email') : '' }}" 
                           class="form-control apple-input {{ $errors->has('name') && $errors->has('email') ? 'apple-input-error' : '' }}" 
                           placeholder="nombre@ejemplo.com">
                    
                    @if($errors->has('email') && $errors->has('name'))
                        <span class="apple-error-text">
                            <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $errors->first('email') }}
                        </span>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="apple-label">Contraseña</label>
                    <input type="password" 
                           name="password" 
                           class="form-control apple-input {{ $errors->has('name') && $errors->has('password') ? 'apple-input-error' : '' }}" 
                           placeholder="Mínimo 8 caracteres">
                    
                    @if($errors->has('password') && $errors->has('name'))
                        <span class="apple-error-text">
                            <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $errors->first('password') }}
                        </span>
                    @endif
                </div>

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

      </div>
    </div>
  </div>
</div>
<script src="{{ asset('js/carrito.js') }}"></script>
<script src="{{ asset('vendor/js/bootstrap.bundle.min.js') }}"></script>

<script>
    /**
     * Alterna la interfaz visual hacia el formulario de Registro
     */
    function mostrarRegistro() {
        document.getElementById('loginForm').style.display = 'none';
        document.getElementById('registerForm').style.display = 'block';
        // Usamos 'Crear cuenta' o 'Registrarse' en perfecta sincronía con el Blade
        document.getElementById('modalTitle').innerText = 'Crear cuenta';
    }

    /**
     * Alterna la interfaz visual hacia el formulario de Login
     */
    function mostrarLogin() {
        document.getElementById('loginForm').style.display = 'block';
        document.getElementById('registerForm').style.display = 'none';
        document.getElementById('modalTitle').innerText = 'Iniciar sesión';
    }
</script> 

{{-- Si Laravel detecta errores de validación, disparamos la apertura automática --}}
@if($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Inicializamos y mostramos tu modal de Bootstrap 'loginModal'
        var myModal = new bootstrap.Modal(document.getElementById('loginModal'));
        myModal.show();
    });
</script>
@endif
</body>
</html>