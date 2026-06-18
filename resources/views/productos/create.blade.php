@extends('plantillas.app') 

@section('content') 
<style>
    /* Chrome, Safari, Edge, Opera */
    input.sin-flechas::-webkit-inner-spin-button,
    input.sin-flechas::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input.sin-flechas {
        -moz-appearance: textfield;
    }
</style>

<div class="container" style="margin-top: 30px; margin-bottom: 30px; max-width: 700px; font-family: 'Segoe UI', sans-serif;">
    <h2>Crear Nuevo Producto</h2>
    <hr>

    @if(session('success'))
        <div class="alert alert-success" style="color: green; background-color: #e2f0d9; padding: 15px; margin-bottom: 15px; border-radius: 4px;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- 1. Categoría del Producto (Arriba del todo) --}}
        <div class="form-group" style="margin-bottom: 15px;">
            <label style="font-weight: 500; display: block; margin-bottom: 5px;">Categoría del Producto:</label>
            <select name="categoria_id" id="categoria_id" class="form-control" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc; background-color: white;">
                <option value="" disabled {{ old('categoria_id') == '' ? 'selected' : '' }}>Selecciona una opción</option>
                <option value="1" {{ old('categoria_id') == '1' ? 'selected' : '' }}>1 Fundas</option>
                <option value="2" {{ old('categoria_id') == '2' ? 'selected' : '' }}>2 Cargadores</option>
                <option value="3" {{ old('categoria_id') == '3' ? 'selected' : '' }}>3 ComeCables</option>
            </select>
            @error('categoria_id')
                <small style="color: #dc3545; font-weight: 500; margin-top: 4px; display: block;">{{ $message }}</small>
            @enderror
        </div>

        {{-- Campo: Nombre (Visible para ComeCables) --}}
        <div class="form-group" id="grupo-nombre" style="margin-bottom: 15px;">
            <label style="font-weight: 500; display: block; margin-bottom: 5px;">Nombre del Producto:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
            @error('nombre')
                <small style="color: #dc3545; font-weight: 500; margin-top: 4px; display: block;">{{ $message }}</small>
            @enderror
        </div>

        {{-- Contenedor del Campo: Modelo --}}
        <div class="form-group" id="grupo-modelo" style="margin-bottom: 15px;">
            <label style="font-weight: 500; display: block; margin-bottom: 5px;">Modelo:</label>
            <input type="text" name="modelo" id="modelo" value="{{ old('modelo') }}" class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
            @error('modelo')
                <small style="color: #dc3545; font-weight: 500; margin-top: 4px; display: block;">{{ $message }}</small>
            @enderror
        </div>

        {{-- Contenedor del Campo: Marca --}}
        <div class="form-group" id="grupo-marca" style="margin-bottom: 15px;">
            <label style="font-weight: 500; display: block; margin-bottom: 5px;">Marca:</label>
            <input type="text" name="marca" id="marca" value="{{ old('marca') }}" class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
            @error('marca')
                <small style="color: #dc3545; font-weight: 500; margin-top: 4px; display: block;">{{ $message }}</small>
            @enderror
        </div>

        <div style="display: flex; gap: 15px; margin-bottom: 15px;">
            {{-- Campo: Precio --}}
            <div class="form-group" style="flex: 1;">
                <label style="font-weight: 500; display: block; margin-bottom: 5px;">Precio ($):</label>
                <input type="number" step="1" min="0" name="precio" value="{{ old('precio') }}" placeholder="0" class="form-control sin-flechas" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
                @error('precio')
                    <small style="color: #dc3545; font-weight: 500; margin-top: 4px; display: block;">{{ $message }}</small>
                @enderror
            </div>

            {{-- Campo: Stock --}}
            <div class="form-group" style="flex: 1;">
                <label style="font-weight: 500; display: block; margin-bottom: 5px;">Stock Disponible:</label>
                <input type="number" min="0" name="stock" value="{{ old('stock') }}" placeholder="0" class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
                @error('stock')
                    <small style="color: #dc3545; font-weight: 500; margin-top: 4px; display: block;">{{ $message }}</small>
                @enderror
            </div>
        </div>

        {{-- Contenedor del Campo: Cantidad de Diseños --}}
        <div class="form-group" id="grupo-disenos" style="margin-bottom: 15px;">
            <label style="font-weight: 500; display: block; margin-bottom: 5px;">Cantidad de Diseños:</label>
            <input type="number" min="0" name="disenos" id="disenos" value="{{ old('disenos') }}" placeholder="0" class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
            @error('disenos')
                <small style="color: #dc3545; font-weight: 500; margin-top: 4px; display: block;">{{ $message }}</small>
            @enderror
        </div>

        {{-- Campo: Imagen --}}
        <div class="form-group" style="margin-bottom: 20px;">
            <label style="font-weight: 500; display: block; margin-bottom: 5px;">Imagen del Producto:</label>
            <input type="file" name="imagen" class="form-control" accept="image/*" style="width: 100%; padding: 5px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
            @error('imagen')
                <small style="color: #dc3545; font-weight: 500; margin-top: 4px; display: block;">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-weight: 500;">
            Guardar Producto
        </button>
        <a href="{{ route('admin.index') }}" class="btn btn-secondary" style="background-color: #6c757d; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; margin-left: 10px; font-size: 14px; display: inline-block;">
            Volver
        </a>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const selectorCategoria = document.getElementById('categoria_id');
    
    // Inputs
    const inputNombre  = document.getElementById('nombre');
    const inputModelo  = document.getElementById('modelo');
    const inputMarca   = document.getElementById('marca');
    const inputDisenos = document.getElementById('disenos');

    // Grupos HTML
    const grupoNombre  = document.getElementById('grupo-nombre');
    const grupoModelo  = document.getElementById('grupo-modelo');
    const grupoMarca   = document.getElementById('grupo-marca');
    const grupoDisenos = document.getElementById('grupo-disenos');

    function alterarFormulario() {
        const valor = selectorCategoria.value;

        if (valor === '1') {
            // FUNDAS: Muestra todo
            grupoNombre.style.display  = 'block'; inputNombre.disabled  = false;
            grupoModelo.style.display  = 'block'; inputModelo.disabled  = false;
            grupoMarca.style.display   = 'block'; inputMarca.disabled   = false;
            grupoDisenos.style.display = 'block'; inputDisenos.disabled = false;
        } else if (valor === '2') {
            // CARGADORES: Oculta modelo y diseños. Muestra nombre y marca.
            grupoNombre.style.display  = 'block'; inputNombre.disabled  = false;
            grupoModelo.style.display  = 'none';  inputModelo.disabled  = true;
            grupoMarca.style.display   = 'block'; inputMarca.disabled   = false;
            grupoDisenos.style.display = 'none';  inputDisenos.disabled = true;
        } else if (valor === '3') {
            // COMECABLES: Muestra NOMBRE. Oculta modelo, marca y diseños.
            grupoNombre.style.display  = 'block'; inputNombre.disabled  = false;
            grupoModelo.style.display  = 'none';  inputModelo.disabled  = true;
            grupoMarca.style.display   = 'none';  inputMarca.disabled   = true;
            grupoDisenos.style.display = 'none';  inputDisenos.disabled = true;
        } else {
            // Por defecto si no hay selección
            grupoNombre.style.display  = 'block'; inputNombre.disabled  = false;
            grupoModelo.style.display  = 'block'; inputModelo.disabled  = false;
            grupoMarca.style.display   = 'block'; inputMarca.disabled   = false;
            grupoDisenos.style.display = 'block'; inputDisenos.disabled = false;
        }
    }

    selectorCategoria.addEventListener('change', alterarFormulario);
    alterarFormulario();
});
</script>
@endsection