@extends('plantillas.app')

@section('content')
<div class="container">
    <h1>Catalogo de <b>Fundas</b></h1>
    
    <div class="row">
        @foreach ($fundas as $funda)
            <div class="col-6 col-md-4 col-lg-2 mb-4">
                {{-- No usamos clases o data-attributes de carrito aquí para que JS lo ignore en esta vista --}}
                <div class="product-card">
                     
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
                        
                        {{-- Se corrige para mostrar la cantidad de diseños --}}
                        <small class="text-muted" style="display: block;">diseños: {{ $funda->disenos }}</small>
                        
                        {{-- Se agrega la cantidad disponible en base al stock real --}}
                        <small class="text-muted" style="display: block;">disponibles: {{ $funda->stock }}</small>
                        
                        <p class="product-price">${{ number_format($funda->precio, 0, ',', '.') }}</p>
                        
                        <div class="mt-1">
                            @if($funda->stock == 0)
                                <span style="font-size: 11px;" class="text-danger fw-medium">Agotado</span>
                            @endif
                        </div>
                    </div>

                    <div class="product-action">
                        {{-- Botón directo a la página de detalle --}}
                        <a href="{{ route('detalle-funda', $funda->id) }}" class="btn-buy text-center text-decoration-none w-100" style="display: block; width: 100%;">
                            @if($funda->stock > 0)
                                Ver detalle
                            @else
                                Agotado
                            @endif
                        </a>
                    </div>
                </div>
            </div> 
        @endforeach
    </div> 
</div>
@endsection