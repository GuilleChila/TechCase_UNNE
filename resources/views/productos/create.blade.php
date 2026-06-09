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

<div class="container" style="margin-top: 30px; margin-bottom: 30px;">
    <h2>Crear Nuevo Producto</h2>
    <hr>

    @if(session('success'))
        <div class="alert alert-success" style="color: green; background-color: #e2f0d9; padding: 15px; margin-bottom: 15px; border-radius: 4px;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger" style="color: red; background-color: #fce4d6; padding: 15px; margin-bottom: 15px; border-radius: 4px;">
            <ul style="margin-bottom: 0;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Nombre del Producto:</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Modelo:</label>
            <input type="text" name="modelo" value="{{ old('modelo') }}" class="form-control">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Marca:</label>
            <input type="text" name="marca" value="{{ old('marca') }}" class="form-control">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Precio ($):</label>
            <input type="number" step="1" min="0" name="precio" value="{{ old('precio') }}" placeholder="0" class="form-control sin-flechas">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Stock Disponible:</label>
            <input type="number" min="0" name="stock" value="{{ old('stock') }}" placeholder="0" class="form-control">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Cantidad de Diseños:</label>
            <input type="number" min="0" name="disenos" value="{{ old('disenos') }}" placeholder="0" class="form-control">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Categoría del Producto:</label>
            <select name="categoria_id" class="form-control" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc;">
                <option value="" disabled {{ old('categoria_id') == '' ? 'selected' : '' }}>Selecciona una opción</option>
                <option value="1" {{ old('categoria_id') == '1' ? 'selected' : '' }}>1 Fundas</option>
                <option value="2" {{ old('categoria_id') == '2' ? 'selected' : '' }}>2 Cargadores</option>
                <option value="3" {{ old('categoria_id') == '3' ? 'selected' : '' }}>3 ComeCables</option>
            </select>
        </div>

        <div class="form-group" style="margin-bottom: 20px;">
            <label>Imagen del Producto:</label>
            <input type="file" name="imagen" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
            Guardar Producto
        </button>
    </form>
</div>
@endsection