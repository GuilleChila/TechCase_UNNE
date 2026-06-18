@extends('plantillas.app') 

@section('content') 
<div class="container" style="margin-top: 30px; margin-bottom: 30px; max-width: 700px;">
    <h2>Modificar Producto: {{ $producto->nombre }}</h2>
    <hr>

    {{-- Si hay errores globales de validación, los mostramos elegantemente --}}
    @if ($errors->any())
        <div class="alert alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 4px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.update', $producto) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Campo: Nombre --}}
        <div class="form-group" style="margin-bottom: 15px;">
            <label>Nombre del Producto:</label>
            <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}" class="form-control" required style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;">
        </div>

        {{-- Campo: Modelo --}}
        <div class="form-group" style="margin-bottom: 15px;">
            <label>Modelo compatible:</label>
            <input type="text" name="modelo" value="{{ old('modelo', $producto->modelo) }}" class="form-control" required style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;">
        </div>

        <div style="display: flex; gap: 15px; margin-bottom: 15px;">
            {{-- Campo: Precio --}}
            <div class="form-group" style="flex: 1;">
                <label>Precio ($):</label>
                <input type="number" step="1" min="0" name="precio" value="{{ old('precio', $producto->precio) }}" class="form-control" required style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;">
            </div>

            {{-- Campo: Stock --}}
            <div class="form-group" style="flex: 1;">
                <label>Stock Disponible:</label>
                <input type="number" min="0" name="stock" value="{{ old('stock', $producto->stock) }}" class="form-control" required style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;">
            </div>
        </div>

        <div style="display: flex; gap: 15px; margin-bottom: 15px;">
            {{-- Campo: Categoría --}}
            <div class="form-group" style="flex: 1;">
                <label>Categoría del Producto:</label>
                <select name="categoria_id" id="categoria_id" class="form-control" required style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; background-color: white;">
                    <option value="1" {{ old('categoria_id', $producto->categoria_id) == 1 ? 'selected' : '' }}>1 Fundas</option>
                    <option value="2" {{ old('categoria_id', $producto->categoria_id) == 2 ? 'selected' : '' }}>2 Cargadores</option>
                    <option value="3" {{ old('categoria_id', $producto->categoria_id) == 3 ? 'selected' : '' }}>3 ComeCables</option>
                </select>
            </div>

            {{-- Campo: Marca --}}
            <div class="form-group" style="flex: 1;">
                <label>Marca:</label>
                <input type="text" name="marca" value="{{ old('marca', $producto->marca) }}" class="form-control" required style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;">
            </div>
        </div>

        {{-- Campo: Cantidad de Diseños (Dinámico) --}}
        <div class="form-group" style="margin-bottom: 15px;">
            <label>Cantidad de Diseños:</label>
            <input type="number" min="0" name="disenos" id="disenos" value="{{ old('disenos', $producto->disenos) }}" class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;">
            <small id="aviso-disenos" style="color: #dc3545; display: none; margin-top: 5px;">
                ⚠️ La cantidad de diseños solo se guarda y se exige para la categoría Fundas.
            </small>
        </div>

        {{-- Campo: Imagen --}}
        <div class="form-group" style="margin-bottom: 20px;">
            <label>Imagen del Producto (Dejar en blanco para conservar la actual):</label>
            <input type="file" name="imagen" class="form-control" accept="image/*" style="width: 100%; padding: 5px; border: 1px solid #ced4da; border-radius: 4px;">
            @if($producto->imagen)
                <div style="margin-top: 10px;">
                    <small style="color: #6c757d; display: block; margin-bottom: 5px;">Imagen actual:</small>
                    <img src="{{ asset('img/' . $producto->imagen) }}" alt="Preview" style="max-height: 80px; border-radius: 6px; border: 1px solid #d2d2d7;">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-weight: 500;">
            Guardar Cambios
        </button>
        
        <a href="{{ route('admin.index') }}" class="btn btn-secondary" style="background-color: #6c757d; color: white; padding: 10px 20px; text-decoration: none; border-radius: 30px; margin-left: 10px; font-size: 14px;">
            Volver
        </a>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const selectorCategoria = document.getElementById('categoria_id');
    const inputDisenos = document.getElementById('disenos');
    const avisoDisenos = document.getElementById('aviso-disenos');

    function evaluarCategoria() {
        if (selectorCategoria.value == '1') {
            // Es funda: habilitamos el campo y lo hacemos requerido
            inputDisenos.disabled = false;
            inputDisenos.required = true;
            avisoDisenos.style.display = 'none';
        } else {
            // No es funda: deshabilitamos el campo y removemos requerimiento
            inputDisenos.disabled = true;
            inputDisenos.required = false;
            avisoDisenos.style.display = 'block';
        }
    }

    // Monitorear cambios y ejecutar al cargar inicialmente la página
    selectorCategoria.addEventListener('change', evaluarCategoria);
    evaluarCategoria();
});
</script>
@endsection