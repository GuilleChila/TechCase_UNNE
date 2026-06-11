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
                <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; border-left: 1px solid #e2e8f0; border-top-left-radius: 14px; border-bottom-left-radius: 14px;"><strong>{{ $product->nombre }}</strong></td>
                <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">{{ $product->modelo }}</td>
                <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">{{ $product->marca }}</td>
                <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">${{ number_format($product->precio, 2) }}</td>
                <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">{{ $product->stock }} u.</td>
                <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; border-right: 1px solid #e2e8f0; border-top-right-radius: 14px; border-bottom-right-radius: 14px;">
                    <a href="{{ route('productos.edit', $product->id) }}" style="color: #2b6cb0; text-decoration: none; margin-right: 15px; font-weight: bold;">Modificar</a>
                    
                    <form action="{{ route('productos.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Confirmas la baja lógica de este producto?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: #e53e3e; background: none; border: none; cursor: pointer; font-weight: bold;">Dar de Baja</button>
                    </form>
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
                <th style="padding: 14px; text-align: left; border-top-right-radius: 14px; border-bottom-right-radius: 14px;">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $user)
            <tr>
                <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; border-left: 1px solid #e2e8f0; border-top-left-radius: 14px; border-bottom-left-radius: 14px;">#{{ $user->id }}</td>
                <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;"><strong>{{ $user->nombre }}</strong></td>
                <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; border-right: 1px solid #e2e8f0; border-top-right-radius: 14px; border-bottom-right-radius: 14px;">{{ $user->email }}</td>
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
                <th style="padding: 14px; text-align: left; border-top-right-radius: 14px; border-bottom-right-radius: 14px;">Detalles</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consultas as $consulta)
            <tr>
                <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; border-left: 1px solid #e2e8f0; border-top-left-radius: 14px; border-bottom-left-radius: 14px;"><strong>{{ $consulta->nombre }}</strong></td>
                <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">{{ $consulta->correo }}</td>
                <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">{{ $consulta->telefono ?? '---' }}</td>
                <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;"><span style="background-color: #edf2f7; color: #2b6cb0; padding: 6px 14px; border-radius: 20px; font-size: 0.85rem; font-weight: bold;">{{ $consulta->motivo }}</span></td>
                <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; border-right: 1px solid #e2e8f0; border-top-right-radius: 14px; border-bottom-right-radius: 14px;">{{ $consulta->mensaje }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2 style="color: #4a5568; border-left: 6px solid #3b5998; padding-left: 12px; margin-top: 50px;">Ventas Realizadas (Historial)</h2>
    <table style="width: 100%; border-collapse: separate; border-spacing: 0 12px; margin-top: 15px;">
        <thead>
            <tr style="background-color: #3b5998; color: white;">
                <th style="padding: 14px; text-align: left; border-top-left-radius: 14px; border-bottom-left-radius: 14px;">ID Carrito</th>
                <th style="padding: 14px; text-align: left;">Cliente</th>
                <th style="padding: 14px; text-align: left;">Productos (Cantidad)</th>
                <th style="padding: 14px; text-align: left; border-top-right-radius: 14px; border-bottom-right-radius: 14px;">Monto Total</th>
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
                <td style="background-color: #fff; padding: 16px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; border-right: 1px solid #e2e8f0; border-top-right-radius: 14px; border-bottom-right-radius: 14px; color: #38a169; font-weight: bold;">
                    ${{ number_format($venta->total, 2) }}
                </td>
            </tr>
            @empty
            <tr><td colspan="4" style="text-align: center; padding: 20px; background-color: #fff;">No hay ventas registradas.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection