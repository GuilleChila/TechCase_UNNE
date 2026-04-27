@extends('plantillas.app')
@section('content')
<div class="cart-container">
    <h1 class="cart-title">Tu Carrito</h1>

    <div class="cart-grid">
        <div class="cart-items">
            <div class="cart-item">
                <div class="item-img">
                    <img src="{{ asset('img/fundas/iphone15-pink.jpg') }}" alt="Producto">
                </div>
                <div class="item-details">
                    <h3>Funda iPhone 15 Pro Max</h3>
                    <p class="item-variant">Diseño: Abstracto #3</p>
                    <div class="item-actions">
                        <div class="quantity-picker">
                            <button>-</button>
                            <input type="text" value="1" readonly>
                            <button>+</button>
                        </div>
                        <button class="btn-remove"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
                <div class="item-price">
                    $5.500
                </div>
            </div>

            <hr class="cart-divider">
        </div>

        <div class="cart-summary">
            <div class="summary-card">
                <h2>Resumen</h2>
                <div class="summary-line">
                    <span>Subtotal</span>
                    <span>$5.500</span>
                </div>
                <div class="summary-line">
                    <span>Envío (Uber Moto)</span>
                    <span>A coordinar</span>
                </div>
                <hr>
                <div class="summary-line total">
                    <span>Total</span>
                    <span>$5.500</span>
                </div>
                
                <p class="summary-note">* Los pagos se realizan vía QR tras confirmar por WhatsApp.</p>
                
                <button class="btn-checkout">Finalizar Compra</button>
                <a href="{{ route('catalogo-fundas') }}" class="btn-continue">Continuar comprando</a>
            </div>
        </div>
    </div>
</div>
@endsection