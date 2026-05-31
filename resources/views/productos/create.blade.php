@extends('plantillas.app') @section('content') <div class="container" style="margin-top: 30px; margin-bottom: 30px;">
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
            <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control" placeholder="Ej: Funda MagSafe">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Modelo:</label>
            <input type="text" name="modelo" value="{{ old('modelo') }}" class="form-control" placeholder="Ej: iPhone 11">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Marca:</label>
            <input type="text" name="marca" value="{{ old('marca') }}" class="form-control" placeholder="Ej: Apple">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Precio ($):</label>
            <input type="number" step="0.01" name="precio" value="{{ old('precio') }}" class="form-control" placeholder="Ej: 5500">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Stock Disponible:</label>
            <input type="number" name="stock" value="{{ old('stock') }}" class="form-control" placeholder="Ej: 10">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Cantidad de Diseños:</label>
            <input type="number" name="disenos" value="{{ old('disenos') }}" class="form-control" placeholder="Ej: 7">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>ID de Categoría (1=Fundas, 2=Cargadores, 3=ComeCables):</label>
            <input type="number" name="categoria_id" value="{{ old('categoria_id') }}" class="form-control" placeholder="Ej: 1">
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