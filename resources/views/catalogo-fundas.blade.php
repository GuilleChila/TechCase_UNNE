@extends('plantillas.app')
@section('content')
<div class="container">
<h1>catalogo de <b>Fundas</b></h1>
    <div class="row">
        @foreach ($fundas as $funda)
           <div class="col-6 col-md-4 col-lg-2 mb-4"> <div class="product-card">
                <div class="product-image-container">
                    <img src="{{ asset('img/' . $funda['imagen']) }}" alt="{{ $funda['modelo'] }}" class="product-img">
                </div>

                <div class="product-info">
                    <h3 class="product-model">{{ $funda['modelo'] }}</h3>
                    <h3 class="product-model">Precio</h3>
                    <p class="product-price">${{ number_format($funda['precio'], 0, ',', '.') }}</p>
                </div>

                <div class="product-action">
                    <a href="{{ route('detalle-funda', ['id' => $funda['id']]) }}" class="btn-buy">Comprar</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection