@extends('plantillas.app')

@section('content')
<div class="product-page">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="product-image-container">
                    @if($funda->imagen)
                        <img src="{{ asset('img/' . $funda->imagen) }}" class="img-fluid" alt="{{ $funda->modelo }}">
                    @else
                        <img src="{{ asset('img/no-image.png') }}" class="img-fluid" alt="Sin imagen" style="opacity: 0.5;">
                    @endif
                </div>
            </div>
            
            <div class="col-md-5 product-card" 
                 data-id="{{ $funda->id }}" 
                 data-nombre="{{ $funda->marca }} - {{ $funda->nombre }}" 
                 data-precio="{{ $funda->precio }}" 
                 data-imagen="{{ asset('img/' . $funda->imagen) }}">
                 
                <nav class="breadcrumb-nav">
                    <a href="{{ route('principal') }}">Inicio</a> / 
                    <a href="{{ route('catalogo-fundas') }}">Fundas</a> / 
                    <span>{{ $funda->modelo }}</span>
                </nav>

                <h1 class="product-title">{{ $funda->marca }} - {{ $funda->nombre }}</h1>
                <p class="text-muted">Compatibilidad: {{ $funda->modelo }}</p>
                
                <div class="product-price">
                   ${{ number_format($funda->precio, 0, ',', '.') }}
                </div>

                <div class="design-section">
                    <label>DISEÑO</label>
                    <div class="design-grid">
                        @for ($i = 1; $i <= ($funda->disenos ?? 1); $i++)
                            <input type="radio" class="btn-check" name="diseno" id="d{{$i}}" value="{{ $i }}" {{ $i==1 ? 'checked' : '' }}>
                            <label class="design-option" for="d{{$i}}">{{ $i }}</label>
                        @endfor
                    </div>
                </div>

                <div class="purchase-section">
                    <div class="quantity-picker">
                        <button type="button" class="quantity-btn minus">-</button>
                        
                        <input type="text" class="quantity-input" value="{{ request()->query('cantidad', 1) }}" readonly style="color: #1d1d1f !important; font-weight: 600; text-align: center; width: 32px; height: 100%; border: none; background: transparent; padding: 0; margin: 0; outline: none; font-size: 16px;">
                        
                        <button type="button" class="quantity-btn plus">+</button>
                    </div>
                    
                    <button type="button" class="btn-add-to-cart add-to-cart-btn">Agregar al carrito</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection