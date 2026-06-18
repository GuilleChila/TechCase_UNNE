@extends('plantillas.app')

@section('content')
<div class="container">
    <h1>Catálogo <b>Come Cables</b></h1>
    
    <div class="row">
        @foreach ($comeCables as $comeCable)
            <div class="col-6 col-md-4 col-lg-2 mb-4"> 
                <div class="product-card" 
                     data-id="{{ $comeCable->id }}" 
                     data-tipo="comecable" 
                     data-nombre="{{ $comeCable->nombre }}" 
                     data-precio="{{ $comeCable->precio }}" 
                     data-imagen="{{ asset('img/' . $comeCable->imagen) }}"
                     data-stock="{{ $comeCable->stock }}">
                     
                    <div class="product-image-container">
                        @if($comeCable->imagen)
                            <img src="{{ asset('img/' . $comeCable->imagen) }}" alt="{{ $comeCable->descripcion }}" class="product-img">
                        @else
                            <img src="{{ asset('img/no-image.png') }}" alt="Sin imagen" class="product-img" style="opacity: 0.5;">
                        @endif
                    </div>

                    <div class="product-info">
                        <h3 class="product-model">{{ $comeCable->descripcion }}</h3>
                        
                        {{-- Nombre del comecable en letra más visible y posicionado primero --}}
                        <strong style="display: block; font-size: 1.1rem; color: #1d1d1f; margin-top: 5px; margin-bottom: 2px;">
                            {{ $comeCable->nombre }}
                        </strong>
                        
                        {{-- Cantidad disponible debajo del nombre --}}
                        <small class="text-muted" style="display: block; margin-bottom: 5px;">disponibles: {{ $comeCable->stock }}</small>

                        <p class="product-price">${{ number_format($comeCable->precio, 0, ',', '.') }}</p>
                        
                        {{-- Badge de stock --}}
                        <div class="mt-1">
                            @if($comeCable->stock == 0)
                                <span style="font-size: 11px;" class="text-danger fw-medium">Agotado</span>
                            @elseif($comeCable->stock <= 3)
                                <span style="font-size: 11px;" class="text-warning fw-medium">¡Solo {{ $comeCable->stock }} disponibles!</span>
                            @endif
                        </div>
                    </div>

                    <div class="product-action">
                        @if($comeCable->stock > 0)
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