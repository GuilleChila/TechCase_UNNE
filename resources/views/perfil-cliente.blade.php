@extends('plantillas.app')

@section('content')
<div class="profile-wrapper">
    
    <div class="profile-main-header">
        <h1>Tu Cuenta</h1>
        <p>Gestioná tus datos personales y revisá el historial de tus pedidos en TechCase.</p>
    </div>

    <div class="profile-grid">
        
        <div class="apple-card-premium">
            <h2>Información Personal</h2>
            <p class="section-subtitle-premium">Tus datos de identidad registrados en la plataforma.</p>
            
            <div class="user-info-fields">
                <div class="info-row-premium">
                    <span class="info-label-premium">Nombre Completo:</span>
                    <span class="info-value-premium">{{ $usuario->nombre }}</span>
                </div>
                <div class="info-row-premium">
                    <span class="info-label-premium">Correo Electrónico:</span>
                    <span class="info-value-premium">{{ $usuario->correo }}</span>
                </div>
                <div class="info-row-premium">
                    <span class="info-label-premium">DNI / Documento:</span>
                    <span class="info-value-premium">{{ $usuario->documento }}</span>
                </div>
            </div>
        </div>

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
                                        @foreach($compra->productos as $producto)
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

            // Cierra de manera limpia cualquier otro acordeón abierto (Efecto Single-Collapse)
            collapsibleOrders.forEach(otherOrder => {
                if (otherOrder !== order && otherOrder.classList.contains('is-open')) {
                    otherOrder.classList.remove('is-open');
                    otherOrder.querySelector('.order-details-collapse').style.maxHeight = null;
                }
            });

            // Conmutar el estado del elemento actual
            if (isOpen) {
                order.classList.remove('is-open');
                collapseContainer.style.maxHeight = null;
            } else {
                order.classList.add('is-open');
                // Calcula el scrollHeight exacto en tiempo real para activar la aceleración CSS
                collapseContainer.style.maxHeight = collapseContainer.scrollHeight + "px";
            }
        });
    });
});
</script>
@endsection