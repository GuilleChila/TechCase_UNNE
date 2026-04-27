 @extends('plantillas.app')
 @section('content')
    <h1>catalogo <b>Come Cables</b></h1>
    <div class="row">
    @foreach ($ComeCables as $ComeCable)
        <div class="col-6 col-md-4 col-lg-2 mb-4"> 
            <div class="product-card">
                <div class="product-image-container">
                    {{-- Usamos la clave 'imagen' de tu array --}}
                    <img src="{{ asset('img/' . $ComeCable['imagen']) }}" alt="{{ $ComeCable['descripcion'] }}" class="product-img">
                </div>

                <div class="product-info">
                    {{-- Mostramos la marca y descripción --}}
                    <h3 class="product-model"> {{ $ComeCable['descripcion'] }}</h3>

                    <p class="product-price">${{ number_format($ComeCable['precio'], 0, ',', '.') }}</p>
                </div>

                <div class="product-action">
            <div class="quantity-selector">
              <button class="quantity-btn minus">-</button>
              <input type="text" class="quantity-input" value="1">
              <button class="quantity-btn plus">+</button>
            </div>
            <button class="btn-buy add-to-cart-btn">Añadir al carrito</button>
          </div>
            </div>
        </div>
    @endforeach
</div>
 @endsection