@extends('plantillas.app')

@section('content')
<div class="profile-wrapper">
    
    <div class="profile-main-header">
        <h1>Tu Cuenta</h1>
        <p>Gestioná tus datos personales y revisá el historial de tus pedidos en TechCase.</p>
    </div>

    <div class="profile-grid">
        
        {{-- TARJETA DE INFORMACIÓN PERSONAL --}}
        <div class="apple-card-premium account-card">
            <h2>Información Personal</h2>
            <p class="section-subtitle-premium">Tus datos de identidad registrados en la plataforma.</p>
            
            @if(session('success'))
                <div class="alert alert-success d-flex align-items-center mb-3 apple-alert-profile" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <div>{{ session('success') }}</div>
                </div>
            @endif

            <form method="POST" action="{{ route('perfil.update') }}" novalidate class="profile-form">
                @csrf
                @method('PUT')

                {{-- Campo: Nombre Completo --}}
                <div class="profile-field-group">
                    <span class="profile-field-label">Nombre Completo:</span>
                    <div class="profile-field-input-block">
                        <input type="text" name="name" 
                               value="{{ old('name', $usuario->nombre) }}" 
                               class="form-control apple-profile-input @error('name') input-error-state @enderror">
                        @error('name')
                            <span class="profile-error-message"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Campo: Correo Electrónico --}}
                <div class="profile-field-group">
                    <span class="profile-field-label">Correo Electrónico:</span>
                    <div class="profile-field-input-block">
                        <input type="email" name="email" 
                               value="{{ old('email', $usuario->correo) }}" 
                               class="form-control apple-profile-input @error('email') input-error-state @enderror">
                        @error('email')
                            <span class="profile-error-message"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Campo: DNI / Documento (Fijo y Seguro) --}}
                <div class="profile-field-group">
                    <span class="profile-field-label">DNI / Documento:</span>
                    <div class="profile-field-input-block">
                        <input type="text" value="{{ $usuario->documento }}" class="form-control apple-profile-input input-disabled-state" readonly disabled>
                    </div>
                </div>

                <hr class="profile-divider">

                {{-- SECCIÓN: SEGURIDAD --}}
                <h3 class="profile-section-title">Seguridad de la Cuenta</h3>

                {{-- Contraseña Actual --}}
                <div class="profile-field-group">
                    <span class="profile-field-label">Contraseña Actual:</span>
                    <div class="profile-field-input-block">
                        <input type="password" name="current_password" placeholder="Ingresá tu clave actual"
                               class="form-control apple-profile-input @error('current_password') input-error-state @enderror">
                        @error('current_password')
                            <span class="profile-error-message"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Nueva Contraseña --}}
                <div class="profile-field-group">
                    <span class="profile-field-label">Nueva Contraseña:</span>
                    <div class="profile-field-input-block">
                        <input type="password" name="password" placeholder="Mínimo 8 caracteres"
                               class="form-control apple-profile-input @error('password') input-error-state @enderror">
                        @error('password')
                            <span class="profile-error-message"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Repetir Nueva Contraseña --}}
                <div class="profile-field-group">
                    <span class="profile-field-label">Repetir Nueva:</span>
                    <div class="profile-field-input-block">
                        <input type="password" name="password_confirmation" placeholder="Confirmá tu nueva clave"
                               class="form-control apple-profile-input">
                    </div>
                </div>

                {{-- Botón Guardar Cambios --}}
                <div class="profile-action-block">
                    <button type="submit" class="btn btn-primary apple-profile-submit">
                        Guardar cambios
                    </button>
                </div>
            </form>
        </div>

        {{-- TARJETA HISTORIAL DE COMPRAS --}}
        <div class="apple-card-premium">
            <h2>Mis Compras</h2>
            <p class="section-subtitle-premium">Historial de tus carritos procesados. Haz clic en una orden para desplegar el detalle de productos.</p>

            @if($compras->isEmpty())
                <div class="empty-history-box">
                    <p class="text-muted text-center py-4">Aún no has realizado ninguna compra en TechCase.</p>
                </div>
            @else
                <div class="orders-history-list">
                    @foreach($compras as $compra)
                        @php 
                            $totalOrden = 0; 
                            foreach($compra->productos as $producto) {
                                $totalOrden += ($producto->pivot->cantidad * $producto->precio);
                            }
                        @endphp

                        <div class="order-history-item collapsible-order">
                            <div class="order-item-header-main">
                                <div class="order-meta-left">
                                    <span class="order-badge">Orden #TC-{{ $compra->id + 48000 }}</span>
                                    <span class="order-date">{{ $compra->created_at->format('d/m/Y H:i') }} hs</span>
                                </div>
                                <div class="order-meta-right">
                                    <div class="order-total-block">
                                        <span class="order-total-label-mini">Total:</span>
                                        <span class="order-total-amount-mini">${{ number_format($totalOrden, 0, ',', '.') }}</span>
                                    </div>
                                    <span class="collapse-arrow-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </span>
                                </div>
                            </div>

                            <div class="order-details-collapse">
                                <div class="order-collapse-inner">
                                    <hr class="order-inner-divider">
                                    <div class="order-products-preview">
                                        @foreach($compras as $compraItem)
                                            {{-- Se mantiene el loop original intacto --}}
                                            @if($compraItem->id == $compra->id)
                                                @foreach($compraItem->productos as $producto)
                                                    <div class="product-mini-row">
                                                        <span class="product-mini-name">
                                                            • {{ $producto->pivot->cantidad }}x {{ $producto->nombre }}
                                                            @if(!empty($producto->pivot->diseno))
                                                                <small class="text-muted">(Diseño {{ $producto->pivot->diseno }})</small>
                                                            @endif
                                                        </span>
                                                        <span class="product-mini-price">
                                                            ${{ number_format($producto->pivot->cantidad * $producto->precio, 0, ',', '.') }}
                                                        </span>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const collapsibleOrders = document.querySelectorAll('.collapsible-order');
    collapsibleOrders.forEach(order => {
        const header = order.querySelector('.order-item-header-main');
        const collapseContainer = order.querySelector('.order-details-collapse');

        header.addEventListener('click', () => {
            const isOpen = order.classList.contains('is-open');
            collapsibleOrders.forEach(otherOrder => {
                if (otherOrder !== order && otherOrder.classList.contains('is-open')) {
                    otherOrder.classList.remove('is-open');
                    otherOrder.querySelector('.order-details-collapse').style.maxHeight = null;
                }
            });

            if (isOpen) {
                order.classList.remove('is-open');
                collapseContainer.style.maxHeight = null;
            } else {
                order.classList.add('is-open');
                collapseContainer.style.maxHeight = collapseContainer.scrollHeight + "px";
            }
        });
    });
});
</script>
@endsection