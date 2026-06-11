@extends('plantillas.app')

@section('content')
<div class="container">
    <h1>Catalogo de <b>Fundas</b></h1>
    
    <div class="row">
        
        @foreach ($fundas as $funda)
            <div class="col-6 col-md-4 col-lg-2 mb-4">
                <div class="product-card" 
                     data-id="{{ $funda->id }}" 
                     data-nombre="{{ $funda->marca }} - {{ $funda->nombre }}" 
                     data-precio="{{ $funda->precio }}" 
                     data-imagen="{{ asset('img/' . $funda->imagen) }}">
                     
                    <div class="product-image-container">
                        @if($funda->imagen)
                            <img src="{{ asset('img/' . $funda->imagen) }}" alt="{{ $funda->nombre }}" class="product-img">
                        @else
                            <img src="{{ asset('img/no-image.png') }}" alt="Sin imagen" class="product-img" style="opacity: 0.5;">
                        @endif
                    </div>

                    <div class="product-info">
                        <h3 class="product-model">{{ $funda->marca }} - {{ $funda->nombre }}</h3>
                        <p class="text-muted mb-0"> {{ $funda->modelo }}</p>
                        <small class="text-muted">disponibles: {{ $funda->disenos }}</small>
                        <p class="product-price">${{ number_format($funda->precio, 0, ',', '.') }}</p>
                    </div>

                    <div class="product-action">
                        <div class="quantity-selector">
                            <button class="quantity-btn minus">-</button>
                            <input type="text" class="quantity-input" value="1" readonly style="color: #1d1d1f !important; font-weight: 600; text-align: center; width: 32px; height: 100%; border: none; background: transparent; padding: 0; margin: 0; outline: none; font-size: 16px;">
                            <button class="quantity-btn plus">+</button>
                        </div>
                        
                        <a href="{{ route('detalle-funda', $funda->id) }}" class="btn-buy btn-ver-detalle text-center text-decoration-none">
                            Ver detalle
                        </a>
                    </div>
                </div>
            </div> 
        @endforeach

    </div> 
</div>
@endsection