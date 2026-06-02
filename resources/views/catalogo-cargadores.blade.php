@extends('plantillas.app')

@section('content')
<div class="container">
    <h1>Catálogo <b>Cargadores</b></h1>
    
    <div class="row">
        @foreach ($Cargadores as $cargador)
            <div class="col-6 col-md-4 col-lg-2 mb-4">
                <div class="product-card" 
                     data-id="{{ $cargador->id }}" 
                     data-nombre="{{ $cargador->marca }} - {{ $cargador->nombre }}" 
                     data-precio="{{ $cargador->precio }}" 
                     data-imagen="{{ asset('img/' . $cargador->imagen) }}">
                     
                    <div class="product-image-container">
                        <img src="{{ asset('img/' . $cargador->imagen) }}" alt="{{ $cargador->nombre }}" class="product-img">
                    </div>

                    <div class="product-info">
                        <h3 class="product-model">{{ $cargador->marca }} - {{ $cargador->nombre }}</h3>

                        @if(isset($cargador->amperaje))
                            <small class="text-muted">{{ $cargador->amperaje }}</small>
                        @endif

                        <p class="product-price">${{ number_format($cargador->precio, 0, ',', '.') }}</p>
                    </div>

                    <div class="product-action">
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
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection