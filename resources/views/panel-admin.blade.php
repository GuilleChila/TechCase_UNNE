@extends('plantillas.app')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding: 20px; font-family: 'Segoe UI', sans-serif;">
    <h1 style="color: #3b5998; margin-bottom: 5px;">Panel de Administración</h1>
    <p style="color: #718096; margin-bottom: 30px;">Tech Case — Centro de Control General</p>

    @if(session('success'))
        <div style="background-color: #c6f6d5; color: #22543d; padding: 15px; border-radius: 14px; margin-bottom: 25px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 40px;">
        <h2 style="color: #4a5568; border-left: 6px solid #3b5998; padding-left: 12px;">Productos en Catálogo</h2>
        <a href="{{ route('productos.create') }}" style="background-color: #2b6cb0; color: white; padding: 12px 24px; border-radius: 30px; text-decoration: none; font-weight: bold;">+ Dar de Alta Producto</a>
    </div>

    <table style="width: 100%; border-collapse: separate; border-spacing: 0 12px; margin-top: 15px;">
        <thead>
            <tr style="background-color: #3b5998; color: white;">
                <th style="padding: 14px; text-align: left; border-top-left-radius: 14px; border-bottom-left-radius: 14px;">Nombre</th>
                <th style="padding: 14px; text-align: left;">Modelo</th>
                <th style="padding: 14px; text-align: left;">Marca</th>
                <th style="padding: 14px; text-align: left;">Precio</th>
                <th style="padding: 14px; text-align: left;">Stock</th>
                <th style="padding: 14px; text-align: left; border-top-right-radius: 14px; border-bottom-right-radius: 14px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td style="background-color: {{ $product->activo ? '#fff' : '#ffeeef' }}; padding: 16px; border-top: 1px solid {{ $product->activo ? '#e2e8f0' : '#fca5a5' }}; border-bottom: 1px solid {{ $product->activo ? '#e2e8f0' : '#fca5a5' }}; border-left: 1px solid {{ $product->activo ? '#e2e8f0' : '#fca5a5' }}; border-top-left-radius: 14px; border-bottom-left-radius: 14px;">
                    <strong>{{ $product->nombre }}</strong>
                </td>
                <td style="background-color: {{ $product->activo ? '#fff' : '#ffeeef' }}; padding: 16px; border-top: 1px solid {{ $product->activo ? '#e2e8f0' : '#fca5a5' }}; border-bottom: 1px solid {{ $product->activo ? '#e2e8f0' : '#fca5a5' }};">
                    {{ $product->modelo }}
                </td>
                <td style="background-color: {{ $product->activo ? '#fff' : '#ffeeef' }}; padding: 16px; border-top: 1px solid {{ $product->activo ? '#e2e8f0' : '#fca5a5' }}; border-bottom: 1px solid {{ $product->activo ? '#e2e8f0' : '#fca5a5' }};">
                    {{ $product->marca }}
                </td>
                <td style="background-color: {{ $product->activo ? '#fff' : '#ffeeef' }}; padding: 16px; border-top: 1px solid {{ $product->activo ? '#e2e8f0' : '#fca5a5' }}; border-bottom: 1px solid {{ $product->activo ? '#e2e8f0' : '#fca5a5' }};">
                    ${{ number_format($product->precio, 2) }}
                </td>
                <td style="background-color: {{ $product->activo ? '#fff' : '#ffeeef' }}; padding: 16px; border-top: 1px solid {{ $product->activo ? '#e2e8f0' : '#fca5a5' }}; border-bottom: 1px solid {{ $product->activo ? '#e2e8f0' : '#fca5a5' }};">
                    {{ $product->stock }} u.
                </td>
                <td style="background-color: {{ $product->activo ? '#fff' : '#ffeeef' }}; padding: 16px; border-top: 1px solid {{ $product->activo ? '#e2e8f0' : '#fca5a5' }}; border-bottom: 1px solid {{ $product->activo ? '#e2e8f0' : '#fca5a5' }}; border-right: 1px solid {{ $product->activo ? '#e2e8f0' : '#fca5a5' }}; border-top-right-radius: 14px; border-bottom-right-radius: 14px;">
                    <a href="{{ route('productos.edit', $product->id) }}" style="color: #2b6cb0; text-decoration: none; margin-right: 15px; font-weight: bold;">Modificar</a>
                    
                    @if($product->activo)
                        <form action="{{ route('productos.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Confirmas la baja lógica de este producto?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: #e53e3e; background: none; border: none; cursor: pointer; font-weight: bold; padding: 0;">Dar de Baja</button>
                        </form>
                    @else
                        <form action="{{ route('productos.activar', $product->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Quieres volver a activar este producto?')">
                            @csrf
                            @method('PATCH')
                            <button type="submit" style="color: #38a169; background: none; border: none; cursor: pointer; font-weight: bold; padding: 0;">Activar</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2 style="color: #4a5568; border-left: 6px solid #3b5998; padding-left: 12px; margin-top: 50px;">Usuarios Registrados</h2>
    <table style="width: 100%; border-collapse: separate; border-spacing: 0 12px; margin-top: 15px;">
        <thead>
            <tr style="background-color: #3b5998; color: white;">
                <th style="padding: 14px; text-align: left; border-top-left-radius: 14px; border-bottom-left-radius: 14px;">ID</th>
                <th style="padding: 14px; text-align: left;">Nombre Completo</th>
                <th style="padding: 14px; text-align: left; border-top-right-radius: 14px; border-bottom-right-radius: 14px;">Correo Electrónico</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $user)
            <tr>
                <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; border-left: 1px solid #e2e8f0; border-top-left-radius: 14px; border-bottom-left-radius: 14px;">#{{ $user->id }}</td>
                <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;"><strong>{{ $user->nombre }}</strong></td>
                <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; border-right: 1px solid #e2e8f0; border-top-right-radius: 14px; border-bottom-right-radius: 14px;">{{ $user->correo }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2 style="color: #4a5568; border-left: 6px solid #3b5998; padding-left: 12px; margin-top: 50px;">Consultas Recibidas (Contacto)</h2>
<table style="width: 100%; border-collapse: separate; border-spacing: 0 12px; margin-top: 15px;">
    <thead>
        <tr style="background-color: #3b5998; color: white;">
            <th style="padding: 14px; text-align: left; border-top-left-radius: 14px; border-bottom-left-radius: 14px;">Nombre Completo</th>
            <th style="padding: 14px; text-align: left;">Correo Electrónico</th>
            <th style="padding: 14px; text-align: left;">Teléfono</th>
            <th style="padding: 14px; text-align: left;">Motivo</th>
            <th style="padding: 14px; text-align: left;">Detalles</th>
            <th style="padding: 14px; text-align: center; border-top-right-radius: 14px; border-bottom-right-radius: 14px;">Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($consultas as $consulta)
        <tr>
            <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; border-left: 1px solid #e2e8f0; border-top-left-radius: 14px; border-bottom-left-radius: 14px;"><strong>{{ $consulta->nombre }}</strong></td>
            <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">{{ $consulta->correo }}</td>
            <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">{{ $consulta->telefono ?? '---' }}</td>
            <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;"><span style="background-color: #edf2f7; color: #2b6cb0; padding: 6px 14px; border-radius: 20px; font-size: 0.85rem; font-weight: bold;">{{ $consulta->motivo }}</span></td>
            <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">{{ $consulta->mensaje }}</td>
            
            <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; border-right: 1px solid #e2e8f0; border-top-right-radius: 14px; border-bottom-right-radius: 14px; text-align: center;">
                <div id="contenedor-consulta-{{ $consulta->id }}">
                    <button type="button" onclick="marcarConsultaLeida('{{ $consulta->id }}')" style="background-color: #e53e3e; color: white; border: none; padding: 8px 16px; border-radius: 20px; font-weight: bold; cursor: pointer; font-size: 0.85rem; box-shadow: 0 2px 4px rgba(229, 62, 62, 0.2); transition: all 0.2s;">
                        No leído
                    </button>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Revisar la memoria del navegador para cada consulta activa de tu bucle
    @foreach($consultas as $consulta)
        if (localStorage.getItem('consulta_leida_' + '{{ $consulta->id }}') === 'true') {
            pintarConsultaLeida('{{ $consulta->id }}');
        }
    @endforeach
});

function marcarConsultaLeida(id) {
    localStorage.setItem('consulta_leida_' + id, 'true');
    pintarConsultaLeida(id);
}

function pintarConsultaLeida(id) {
    const contenedor = document.getElementById('contenedor-consulta-' + id);
    if(contenedor) {
        contenedor.innerHTML = `
            <span style="background-color: #c6f6d5; color: #22543d; padding: 8px 18px; border-radius: 20px; font-weight: bold; font-size: 0.85rem; border: 1px solid #c6f6d5; display: inline-block;">
                ✓ Leído
            </span>
        `;
    }
}
</script>

  <h2 style="color: #4a5568; border-left: 6px solid #3b5998; padding-left: 12px; margin-top: 50px;">Ventas Realizadas (Historial)</h2>
<table style="width: 100%; border-collapse: separate; border-spacing: 0 12px; margin-top: 15px;">
    <thead>
        <tr style="background-color: #3b5998; color: white;">
            <th style="padding: 14px; text-align: left; border-top-left-radius: 14px; border-bottom-left-radius: 14px;">ID Carrito</th>
            <th style="padding: 14px; text-align: left;">Cliente</th>
            <th style="padding: 14px; text-align: left;">Productos (Cantidad)</th>
            <th style="padding: 14px; text-align: left;">Monto Total</th>
            <th style="padding: 14px; text-align: center; border-top-right-radius: 14px; border-bottom-right-radius: 14px;">Detalles</th>
        </tr>
    </thead>
    <tbody>
        @forelse($ventas as $venta)
        <tr>
            <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; border-left: 1px solid #e2e8f0; border-top-left-radius: 14px; border-bottom-left-radius: 14px;">#{{ $venta->id }}</td>
            <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;"><strong>{{ $venta->usuario->nombre ?? 'Usuario #'.$venta->usuario_id }}</strong></td>
            <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">
                @foreach($venta->productos as $prod)
                    <div style="background: #edf2f7; padding: 5px 10px; border-radius: 20px; margin-bottom: 5px; font-size: 0.85rem; display: inline-block; border: 1px solid #e2e8f0;">
                        {{ $prod->nombre }} ({{ $prod->modelo }}) <strong>x{{ $prod->pivot->cantidad }}</strong>
                    </div>
                @endforeach
            </td>
            <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; color: #38a169; font-weight: bold;">
                ${{ number_format($venta->total, 2) }}
            </td>
            <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; border-right: 1px solid #e2e8f0; border-top-right-radius: 14px; border-bottom-right-radius: 14px; text-align: center;">
                
                <button type="button" onclick="document.getElementById('modal-venta-{{ $venta->id }}').showModal()" style="background-color: #2b6cb0; color: white; border: none; padding: 8px 16px; border-radius: 20px; font-weight: bold; cursor: pointer; font-size: 0.85rem;">
                    Ver Detalle
                </button>

                <dialog id="modal-venta-{{ $venta->id }}" style="border: none; border-radius: 20px; padding: 30px; width: 950px; max-width: 95%; box-shadow: 0 15px 35px rgba(0,0,0,0.2); font-family: 'Segoe UI', sans-serif;">
                    
                    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #edf2f7; padding-bottom: 15px; margin-bottom: 25px;">
                        <h2 style="margin: 0; color: #3b5998; font-size: 1.5rem;">Resumen Consolidado de Operación</h2>
                        <button type="button" onclick="document.getElementById('modal-venta-{{ $venta->id }}').close()" style="background: none; border: none; font-size: 1.8rem; cursor: pointer; color: #a0aec0; line-height: 1;">&times;</button>
                    </div>

                    <div style="display: flex; gap: 30px; align-items: flex-start; text-align: left;">
                        
                        <div style="flex: 1; background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                                <h3 style="margin: 0; color: #1a202c; font-size: 1.2rem;">Detalle del Pedido</h3>
                                <span style="background: #edf2f7; color: #4a5568; padding: 4px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: bold;">#TC-{{ $venta->id + 36746 }}</span>
                            </div>

                            <div>
                                @foreach($venta->productos as $prod)
                                <div style="display: flex; align-items: center; gap: 15px; padding: 12px 0; border-bottom: 1px solid #f0f4f8;">
                                    <div style="width: 50px; height: 50px; background: #f7fafc; border-radius: 8px; border: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: center; overflow: hidden; flex-shrink: 0;">
                                        @if($prod->imagen)
                                            <img src="{{ asset('img/' . $prod->imagen) }}" alt="{{ $prod->nombre }}" style="width: 100%; height: 100%; object-fit: cover;">
                                        @else
                                            <span style="font-size: 0.7rem; color: #a0aec0;">Sin foto</span>
                                        @endif
                                    </div>

                                    <div style="display: flex; justify-content: space-between; width: 100%; align-items: center;">
                                        <div>
                                            <h4 style="margin: 0 0 4px 0; font-size: 0.95rem; color: #2d3748;">{{ $prod->marca }} - {{ $prod->nombre }}</h4>
                                            <span style="font-size: 0.85rem; color: #718096;">{{ $prod->pivot->cantidad }} x ${{ number_format($prod->precio, 2) }}</span>
                                        </div>
                                        <span style="font-weight: 600; color: #2d3748; font-size: 0.95rem;">
                                            ${{ number_format($prod->precio * $prod->pivot->cantidad, 2) }}
                                        </span>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div style="border-top: 1px solid #e2e8f0; padding-top: 15px; display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                                <span style="font-size: 1.1rem; font-weight: bold; color: #2d3748;">Total General</span>
                                <span style="font-size: 1.25rem; font-weight: bold; color: #2d3748;">${{ number_format($venta->total, 2) }}</span>
                            </div>
                        </div>

                        <div style="flex: 1; background: #fff; padding: 5px;">
                            <h3 style="margin: 0 0 5px 0; color: #1a202c; font-size: 1.2rem;">Información del Cliente</h3>
                            <p style="color: #718096; margin: 0 0 25px 0; font-size: 0.9rem;">Datos de identidad registrados.</p>

                            <div style="display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid #edf2f7; font-size: 0.95rem;">
                                <span style="color: #718096;">Nombre:</span>
                                <span style="font-weight: 600; color: #2d3748;">{{ $venta->usuario->nombre ?? 'no especificado' }}</span>
                            </div>

                            <div style="display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid #edf2f7; font-size: 0.95rem; margin-bottom: 25px;">
                                <span style="color: #718096;">DNI / Documento:</span>
                                <span style="font-weight: 500; color: #2d3748;">{{ $venta->usuario->documento ?? 'no especificado' }}</span>
                            </div>
                        </div>

                    </div>

                    <div style="margin-top: 35px; border-top: 1px solid #edf2f7; padding-top: 20px; display: flex; justify-content: space-between; align-items: center;">
                        <div style="width: 100px;"></div>

                        <div id="contenedor-accion-{{ $venta->id }}">
                            <button type="button" onclick="guardarConfirmacionLocal('{{ $venta->id }}')" style="background-color: #38a169; color: white; border: none; padding: 12px 30px; border-radius: 25px; font-weight: bold; cursor: pointer; font-size: 1rem; box-shadow: 0 4px 6px rgba(56, 161, 105, 0.2);">
                                Confirmar Compra
                            </button>
                        </div>

                        <button type="button" onclick="document.getElementById('modal-venta-{{ $venta->id }}').close()" style="background-color: #2b6cb0; color: white; border: none; padding: 10px 25px; border-radius: 20px; font-weight: bold; cursor: pointer; font-size: 0.95rem;">
                            Cerrar
                        </button>
                    </div>
                </dialog>

            </td>
        </tr>
        @empty
        <tr><td colspan="5" style="text-align: center; padding: 20px; background-color: #fff;">No hay ventas registradas.</td></tr>
        @endforelse
    </tbody>
</table>

<script>
// 1. Cuando la página termina de cargar, revisamos qué ventas ya estaban confirmadas
document.addEventListener("DOMContentLoaded", function() {
    @foreach($ventas as $venta)
        if (localStorage.getItem('venta_confirmada_' + '{{ $venta->id }}') === 'true') {
            pintarCompraConfirmada('{{ $venta->id }}');
        }
    @endforeach
});

// 2. Al hacer clic, guarda el estado en el navegador y actualiza la vista
function guardarConfirmacionLocal(id) {
    localStorage.setItem('venta_confirmada_' + id, 'true'); // Guardado local persistente
    pintarCompraConfirmada(id);
}

// 3. Modifica el botón por el tilde verde estilizado
function pintarCompraConfirmada(id) {
    const contenedor = document.getElementById('contenedor-accion-' + id);
    if(contenedor) {
        contenedor.innerHTML = `
            <span style="background-color: #c6f6d5; color: #22543d; padding: 10px 24px; border-radius: 25px; font-weight: bold; font-size: 1rem; border: 1px solid #c6f6d5; display: inline-block;">
                ✓ Compra Confirmada
            </span>
        `;
    }
}
</script>
</div>
@endsection