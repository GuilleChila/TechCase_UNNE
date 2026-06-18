@extends('plantillas.app') 

@section('content') 
<div class="container" style="margin-top: 30px; margin-bottom: 30px; max-width: 700px; font-family: 'Segoe UI', sans-serif;">
    <h2>Modificar Producto: {{ $producto->nombre }}</h2>
    <hr>

    <form id="form-modificar" action="{{ route('productos.update', $producto) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Campo: Nombre --}}
        <div class="form-group" style="margin-bottom: 15px;">
            <label style="font-weight: 500; display: block; margin-bottom: 5px;">Nombre del Producto:</label>
            <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}" class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
            @error('nombre')
                <small style="color: #dc3545; font-weight: 500; margin-top: 4px; display: block;">{{ $message }}</small>
            @enderror
        </div>

        {{-- Campo: Modelo --}}
        <div class="form-group" style="margin-bottom: 15px;">
            <label style="font-weight: 500; display: block; margin-bottom: 5px;">Modelo compatible:</label>
            <input type="text" name="modelo" id="modelo" value="{{ old('modelo', $producto->modelo) }}" class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
            <small id="aviso-modelo" style="color: #718096; display: none; margin-top: 5px; font-size: 0.85rem;">
                ℹ️ El modelo compatible no aplica para las categorías Cargadores o ComeCables.
            </small>
            {{-- Contenedor dinámico de error vía JS --}}
            <small id="error-modelo-js" style="color: #dc3545; font-weight: 500; margin-top: 4px; display: none;">El modelo compatible es obligatorio para la categoría Fundas.</small>
            @error('modelo')
                <small style="color: #dc3545; font-weight: 500; margin-top: 4px; display: block;">{{ $message }}</small>
            @enderror
        </div>

        <div style="display: flex; gap: 15px; margin-bottom: 15px;">
            {{-- Campo: Precio --}}
            <div class="form-group" style="flex: 1;">
                <label style="font-weight: 500; display: block; margin-bottom: 5px;">Precio ($):</label>
                <input type="number" step="1" min="0" name="precio" value="{{ old('precio', $producto->precio) }}" class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
                @error('precio')
                    <small style="color: #dc3545; font-weight: 500; margin-top: 4px; display: block;">{{ $message }}</small>
                @enderror
            </div>

            {{-- Campo: Stock --}}
            <div class="form-group" style="flex: 1;">
                <label style="font-weight: 500; display: block; margin-bottom: 5px;">Stock Disponible:</label>
                <input type="number" min="0" name="stock" value="{{ old('stock', $producto->stock) }}" class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
                @error('stock')
                    <small style="color: #dc3545; font-weight: 500; margin-top: 4px; display: block;">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div style="display: flex; gap: 15px; margin-bottom: 15px;">
            {{-- Campo: Categoría --}}
            <div class="form-group" style="flex: 1;">
                <label style="font-weight: 500; display: block; margin-bottom: 5px;">Categoría del Producto:</label>
                <select name="categoria_id" id="categoria_id" class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; background-color: white; box-sizing: border-box;">
                    <option value="1" {{ old('categoria_id', $producto->categoria_id) == 1 ? 'selected' : '' }}>1 Fundas</option>
                    <option value="2" {{ old('categoria_id', $producto->categoria_id) == 2 ? 'selected' : '' }}>2 Cargadores</option>
                    <option value="3" {{ old('categoria_id', $producto->categoria_id) == 3 ? 'selected' : '' }}>3 ComeCables</option>
                </select>
                @error('categoria_id')
                    <small style="color: #dc3545; font-weight: 500; margin-top: 4px; display: block;">{{ $message }}</small>
                @enderror
            </div>

            {{-- Campo: Marca --}}
            <div class="form-group" style="flex: 1;">
                <label style="font-weight: 500; display: block; margin-bottom: 5px;">Marca:</label>
                <input type="text" name="marca" id="marca" value="{{ old('marca', $producto->marca) }}" class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
                @error('marca')
                    <small style="color: #dc3545; font-weight: 500; margin-top: 4px; display: block;">{{ $message }}</small>
                @enderror
            </div>
        </div>

        {{-- Campo: Cantidad de Diseños --}}
        <div class="form-group" style="margin-bottom: 15px;">
            <label style="font-weight: 500; display: block; margin-bottom: 5px;">Cantidad de Diseños:</label>
            <input type="number" min="0" name="disenos" id="disenos" value="{{ old('disenos', $producto->disenos) }}" class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
            <small id="aviso-disenos" style="color: #dc3545; display: none; margin-top: 5px; font-weight: 500;">
                ⚠️ La cantidad de diseños solo se guarda y se exige para la categoría Fundas.
            </small>
            {{-- Contenedor dinámico de error para diseños vía JS --}}
            <small id="error-disenos-js" style="color: #dc3545; font-weight: 500; margin-top: 4px; display: none;">La cantidad de diseños debe ser mayor a 0.</small>
            @error('disenos')
                <small style="color: #dc3545; font-weight: 500; margin-top: 4px; display: block;">{{ $message }}</small>
            @enderror
        </div>

        {{-- Campo: Imagen --}}
        <div class="form-group" style="margin-bottom: 20px;">
            <label style="font-weight: 500; display: block; margin-bottom: 5px;">Imagen del Producto (Dejar en blanco para conservar la actual):</label>
            <input type="file" name="imagen" class="form-control" accept="image/*" style="width: 100%; padding: 5px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
            @error('imagen')
                <small style="color: #dc3545; font-weight: 500; margin-top: 4px; display: block;">{{ $message }}</small>
            @enderror
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
        
        <a href="{{ route('admin.index') }}" class="btn btn-secondary" style="background-color: #6c757d; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; margin-left: 10px; font-size: 14px; display: inline-block;">
            Volver
        </a>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const formulario = document.getElementById('form-modificar');
    const selectorCategoria = document.getElementById('categoria_id');
    const inputDisenos = document.getElementById('disenos');
    const avisoDisenos = document.getElementById('aviso-disenos');
    const inputModelo = document.getElementById('modelo');
    const avisoModelo = document.getElementById('aviso-modelo');
    const inputMarca = document.getElementById('marca');
    const errorModeloJs = document.getElementById('error-modelo-js');
    const errorDisenosJs = document.getElementById('error-disenos-js'); // Captura el contenedor de error de diseños

    function evaluarCategoria() {
        if (selectorCategoria.value == '1') {
            // CATEGORÍA: FUNDAS
            inputDisenos.disabled = false;
            inputDisenos.style.backgroundColor = "white";
            avisoDisenos.style.display = 'none';

            inputModelo.disabled = false;
            inputModelo.style.backgroundColor = "white";
            avisoModelo.style.display = 'none';

            // Corrección: Si el modelo trae las barritas o guiones de otra categoría, limpiamos el campo para exigir la entrada real
            if (inputModelo.value.trim() === '--') {
                inputModelo.value = '';
            }

            // Si la marca tenía guiones debido a ComeCables, la limpiamos
            if (inputMarca.value.trim() === '--') {
                inputMarca.value = '';
            }
            inputMarca.disabled = false;
            inputMarca.style.backgroundColor = "white";
        } else {
            // CATEGORÍAS: CARGRADORES (2) O COMECABLES (3)
            inputDisenos.disabled = true;
            inputDisenos.style.backgroundColor = "#e9ecef"; 
            avisoDisenos.style.display = 'block';
            errorDisenosJs.style.display = 'none'; // Ocultar si cambia de categoría

            inputModelo.disabled = true;
            inputModelo.style.backgroundColor = "#e9ecef"; 
            avisoModelo.style.display = 'block';
            errorModeloJs.style.display = 'none'; // Ocultar error si no aplica

            // Lógica para inhabilitar marca si es ComeCables (3)
            if (selectorCategoria.value == '3') {
                inputMarca.disabled = true;
                inputMarca.value = '--';
                inputMarca.style.backgroundColor = "#e9ecef";
            } else {
                // Si vuelve a Cargadores (2), se rehabilita la marca y se limpia el '--' si existía
                if (inputMarca.value.trim() === '--') {
                    inputMarca.value = '';
                }
                inputMarca.disabled = false;
                inputMarca.style.backgroundColor = "white";
            }
        }
    }

    // Validación preventiva antes de enviar el formulario en la interfaz
    formulario.addEventListener('submit', (e) => {
        let tieneError = false;

        if (selectorCategoria.value == '1') {
            // Validar Campo: Modelo
            const valorModelo = inputModelo.value.trim();
            if (valorModelo === '' || valorModelo === '--') {
                tieneError = true;
                errorModeloJs.style.display = 'block';
                inputModelo.style.border = "1px solid #dc3545";
                inputModelo.focus();
            } else {
                errorModeloJs.style.display = 'none';
                inputModelo.style.border = "1px solid #ced4da";
            }

            // Validar Campo: Diseños (Debe ser mayor a 0)
            const cantidadDisenos = parseInt(inputDisenos.value) || 0;
            if (cantidadDisenos <= 0) {
                tieneError = true;
                errorDisenosJs.style.display = 'block';
                inputDisenos.style.border = "1px solid #dc3545";
                if (!tieneError) { inputDisenos.focus(); } // Hace foco si el modelo ya estaba bien
            } else {
                errorDisenosJs.style.display = 'none';
                inputDisenos.style.border = "1px solid #ced4da";
            }
        }

        if (tieneError) {
            e.preventDefault(); // Detiene el envío si hay algún error
        }
    });

    // Validar en tiempo real mientras el usuario escribe el modelo
    inputModelo.addEventListener('input', () => {
        if (inputModelo.value.trim() !== '' && inputModelo.value.trim() !== '--') {
            errorModeloJs.style.display = 'none';
            inputModelo.style.border = "1px solid #ced4da";
        }
    });

    // Validar en tiempo real mientras el usuario cambia la cantidad de diseños
    inputDisenos.addEventListener('input', () => {
        if (parseInt(inputDisenos.value) > 0) {
            errorDisenosJs.style.display = 'none';
            inputDisenos.style.border = "1px solid #ced4da";
        }
    });

    selectorCategoria.addEventListener('change', evaluarCategoria);
    evaluarCategoria();
});
</script>
@endsection