@extends('plantillas.app')
@section('content')
<div class="cart-container">
    <h1 class="cart-title">Tu Carrito</h1>

    <div class="cart-grid">
        <div class="cart-items" id="cart-items-container">
            </div>

        <div class="cart-summary">
            <div class="summary-card">
                <h2>Resumen</h2>
                <div class="summary-line">
                    <span>Subtotal</span>
                    <span id="cart-subtotal">$0</span>
                </div>
                <div class="summary-line">
                    <span>Envío (Uber Moto)</span>
                    <span>A coordinar</span>
                </div>
                <hr>
                <div class="summary-line total">
                    <span>Total</span>
                    <span id="cart-total">$0</span>
                </div>
                
                <p class="summary-note">* Los pagos se realizan vía QR tras confirmar por WhatsApp.</p>
                
                <button class="btn-checkout">Finalizar Compra</button>
                <a href="{{ route('catalogo-fundas') }}" class="btn-continue">Continuar comprando</a>
            </div>
        </div>
    </div>
</div>
@endsection