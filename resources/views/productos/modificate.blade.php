@extends('plantillas.app') 

@section('content') 
<div class="container" style="margin-top: 30px; margin-bottom: 30px;">
    <h2>Modificar Producto: {{ $producto->nombre }}</h2>
    <p style="color: #6c757d;">
        Categoría actual: <strong>{{ $producto->categoria_id == 1 ? '1 Fundas' : ($producto->categoria_id == 2 ? '2 Cargadores' : '3 ComeCables') }}</strong>
    </p>
    <hr>

    <form action="{{ route('productos.update', $producto) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Precio ($):</label>
            <input type="number" step="1" min="0" name="precio" 
                   value="{{ old('precio', $producto->precio) }}" 
                   class="form-control">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Stock Disponible:</label>
            <input type="number" min="0" name="stock" 
                   value="{{ old('stock', $producto->stock) }}" 
                   class="form-control">
        </div>

        <div class="form-group" style="margin-bottom: 20px;">
            <label>Cantidad de Diseños:</label>
            <input type="number" min="0" name="disenos" 
                   value="{{ old('disenos', $producto->disenos) }}" 
                   class="form-control" 
                   {{ $producto->categoria_id != 1 ? 'disabled' : '' }}>
            
            @if($producto->categoria_id != 1)
                <small style="color: #dc3545; display: block; margin-top: 5px;">
                    ⚠️ La cantidad de diseños solo se puede modificar en las Fundas.
                </small>
            @endif
        </div>

        <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
            Guardar Cambios
        </button>
        
        <a href="{{ route('admin.index') }}" class="btn btn-secondary" style="background-color: #6c757d; color: white; padding: 10px 20px; text-decoration: none; border-radius: 30px; margin-left: 10px;">
            Volver
        </a>
    </form>
</div>
@endsection