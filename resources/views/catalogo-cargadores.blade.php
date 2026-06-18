@extends('plantillas.app')

@section('content')
<div class="container">
    <h1>Catálogo <b>Cargadores</b></h1>
    
    <div class="row">
        @foreach ($Cargadores as $cargador)
            <div class="col-6 col-md-4 col-lg-2 mb-4">
                <div class="product-card" 
                     data-id="{{ $cargador->id }}" 
                     data-tipo="cargador" 
                     data-nombre="{{ $cargador->marca }} - {{ $cargador->nombre }}" 
                     data-precio="{{ $cargador->precio }}" 
                     data-imagen="{{ asset('img/' . $cargador->imagen) }}"
                     data-stock="{{ $cargador->stock }}">
                     
                    <div class="product-image-container">
                        @if($cargador->imagen)
                            <img src="{{ asset('img/' . $cargador->imagen) }}" alt="{{ $cargador->nombre }}" class="product-img">
                        @else
                            <img src="{{ asset('img/no-image.png') }}" alt="Sin imagen" class="product-img" style="opacity: 0.5;">
                        @endif
                    </div>

                    <div class="product-info">
                        <h3 class="product-model">{{ $cargador->marca }} - {{ $cargador->nombre }}</h3>

                        {{-- Se muestra la cantidad disponible debajo del título --}}
                        <small class="text-muted" style="display: block; margin-bottom: 5px;">disponibles: {{ $cargador->stock }}</small>

                        <p class="product-price">${{ number_format($cargador->precio, 0, ',', '.') }}</p>
                        
                        {{-- Badge de stock --}}
                        <div class="mt-1">
                            @if($cargador->stock == 0)
                                <span style="font-size: 11px;" class="text-danger fw-medium">Agotado</span>
                            @elseif($cargador->stock <= 3)
                                <span style="font-size: 11px;" class="text-warning fw-medium">¡Solo {{ $cargador->stock }} disponibles!</span>
                            @endif
                        </div>
                    </div>

                    <div class="product-action">
                        @if($cargador->stock > 0)
                            <div class="quantity-selector">
                                <button class="quantity-btn minus">-</button>
                                <input type="text" 
                                       class="quantity-input" 
                                       value="1" 
                                       readonly 
                                       style="color: #1d1d1f !important; font-weight: 600; text-align: center; width: 32px; height: 100%; border: none; background: transparent; padding: 0; margin: 0; outline: none; font-size: 16px;">
                                <button class="quantity-btn plus">+</button>
                            </div>
                            <button class="btn-buy add-to-cart-btn">Añadir al carrito</button>
                        @else
                            <div class="w-100 text-center text-muted py-2 bg-light rounded" style="font-size: 14px;">
                                No disponible
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection