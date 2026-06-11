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
                
                @if(session('error'))
                    <div class="alert alert-danger border-0 rounded-3 small p-3 mb-3" style="background-color: #fdf2f2; color: #de350b;">
                        {{ session('error') }}
                    </div>
                @endif

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
                
                <form action="{{ route('carrito.finalizar') }}" method="POST" id="form-finalizar-compra">
                    @csrf
                    <input type="hidden" name="carrito_datos" id="carrito-datos-input">
                    
                    <button type="submit" class="btn-checkout w-100 border-0" style="display: block; width: 100%;">
                        Finalizar Compra
                    </button>
                </form>

                <a href="{{ route('catalogo-fundas') }}" class="btn-continue">Continuar comprando</a>
            </div>
        </div>
    </div>
</div>

{{-- Si la compra fue un éxito, dejamos este indicador invisible para que carrito.js sepa que debe borrar el localStorage --}}
@if(session('compra_exitosa'))
    <div id="compra-exitosa-indicador" style="display: none;"></div>
@endif

@endsection