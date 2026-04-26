@extends('plantillas.app')
@section('content')
<div class="product-page">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="product-image-container">
                    <img src="{{ asset('img/' . $funda['imagen']) }}" class="img-fluid" alt="{{ $funda['modelo'] }}">
                </div>
            </div>
            
            <div class="col-md-5">
                <nav class="breadcrumb-nav">
                    <a href="{{ route('principal') }}">Inicio</a> / 
                    <a href="{{ route('catalogo-fundas') }}">Fundas</a> / 
                    <span>{{ $funda['modelo'] }}</span>
                </nav>

                <h1 class="product-title">{{ $funda['modelo'] }}</h1>
                
                <div class="product-price">
                   ${{ number_format($funda['precio'], 0, ',', '.') }}
                </div>

                <div class="design-section">
                    <label>DISEÑO</label>
                    <div class="design-grid">
                        @for ($i = 1; $i <= ($funda['disenos'] ?? 5); $i++)
                            <input type="radio" class="btn-check" name="diseno" id="d{{$i}}" {{ $i==1 ? 'checked' : '' }}>
                            <label class="design-option" for="d{{$i}}">{{ $i }}</label>
                        @endfor
                    </div>
                </div>

                <div class="purchase-section">
                    <div class="quantity-picker">
                        <button type="button">-</button>
                        <input type="text" value="1" readonly>
                        <button type="button">+</button>
                    </div>
                    <button class="btn-add-to-cart">Agregar al carrito</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection