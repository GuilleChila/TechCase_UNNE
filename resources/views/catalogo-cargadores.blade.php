 @extends('plantillas.app')
 @section('content')
    <h1>catalogo <b>cargadores</b></h1>
    <div class="row">
    @foreach ($Cargadores as $cargador)
        <div class="col-6 col-md-4 col-lg-2 mb-4"> 
            <div class="product-card">
                <div class="product-image-container">
                    {{-- Usamos la clave 'imagen' de tu array --}}
                    <img src="{{ asset('img/' . $cargador['imagen']) }}" alt="{{ $cargador['imagen'] }}" class="product-img">
                </div>

                <div class="product-info">
                    {{-- Mostramos la marca y descripción --}}
                    <h3 class="product-model">{{ $cargador['marca'] }} - {{ $cargador['descripcion'] }}</h3>
                    
                    {{-- Si el cargador tiene amperaje, lo mostramos opcionalmente --}}
                    @if(isset($cargador['amperaje']))
                        <small class="text-muted">{{ $cargador['amperaje'] }}</small>
                    @endif

                    <p class="product-price">${{ number_format($cargador['precio'], 0, ',', '.') }}</p>
                </div>

                <div class="product-action">
                    <a href="#" class="btn-buy">Comprar</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
 @endsection
 