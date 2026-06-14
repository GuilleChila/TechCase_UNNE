@extends('plantillas.app')
@section('content')
<div class="titulo-contacto">
    <h2>Formulario de Contacto</h2>
</div>
<section class="form-contacto">

<div class="form-container">
    @if(session('success'))
    <div class="alert alert-success" style="color: green; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger" style="color: red; margin-bottom: 15px;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('contacto.post') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="nombre">Nombre completo</label>
            <input type="text" id="nombre" name="nombre" 
                   value="{{ auth()->check() ? auth()->user()->nombre : old('nombre') }}" 
                   {{ auth()->check() ? 'readonly' : '' }}
                   style="{{ auth()->check() ? 'background-color: #f7fafc; color: #718096; cursor: not-allowed;' : '' }}"
                   placeholder="Ingresa tu nombre" required>
        </div>

        <div class="form-group">
            <label for="correo">Correo electrónico</label>
            <input type="email" id="correo" name="correo" 
                   value="{{ auth()->check() ? auth()->user()->correo : old('correo') }}" 
                   {{ auth()->check() ? 'readonly' : '' }}
                   style="{{ auth()->check() ? 'background-color: #f7fafc; color: #718096; cursor: not-allowed;' : '' }}"
                   placeholder="ejemplo@correo.com" required>
        </div>

        <div class="form-group">
            <label for="telefono">Número de teléfono</label>
            <input type="tel" id="telefono" name="telefono" placeholder="Ej: +54 9 11 1234 5678" value="{{ old('telefono') }}">
        </div>

        <div class="form-group">
            <label for="motivo">Motivo de la consulta</label>
            <select id="motivo" name="motivo" required>
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="ventas" {{ old('motivo') == 'ventas' ? 'selected' : '' }}>Ventas / Compras</option>
                <option value="soporte" {{ old('motivo') == 'soporte' ? 'selected' : '' }}>Soporte Técnico</option>
                <option value="envios" {{ old('motivo') == 'envios' ? 'selected' : '' }}>Estado de Envío</option>
                <option value="otros" {{ old('motivo') == 'otros' ? 'selected' : '' }}>Otros</option>
            </select>
        </div>

        <div class="form-group">
            <label for="mensaje">Detalles de la consulta</label>
            <textarea id="mensaje" name="mensaje" rows="4" placeholder="Escribe tu duda aquí...">{{ old('mensaje') }}</textarea>
        </div>

        <button type="submit" class="btn-submit">Enviar consulta</button>
        
    </form>
</div>

</section>
@endsection