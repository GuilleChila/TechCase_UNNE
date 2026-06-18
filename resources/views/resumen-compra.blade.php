@extends('plantillas.app')

@section('content')
{{-- DETONADOR SEGURO: Al estar arriba del DOM, se evalúa antes de que el script ejecute la sección 5 --}}
@if(session('compra_exitosa'))
    <div id="compra-exitosa-indicador" style="display: none;"></div>
@endif

<div class="summary-wrapper">
    
    <div class="summary-main-header">
        <h1>Confirma tu Pedido</h1>
        <p>Revisa la información detallada antes de enviar el pedido a la tienda.</p>
    </div>

    {{-- Notificación elegante si la base de datos ya procesó el pedido --}}
    @if(session('compra_exitosa'))
        <div class="alert alert-success border-0 rounded-3 small p-3 mb-4 text-center" style="background-color: #f2faf5; color: #147a32; font-family: 'Inter', sans-serif; font-weight: 500;">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('compra_exitosa') }}
        </div>
    @endif

    <div class="summary-grid">
        
        <div class="apple-card-premium">
            <div class="card-header-split">
                <h2>Detalle del Pedido</h2>
                <span id="summary-order-id" class="apple-badge-premium">#TC-{{ rand(10000, 99999) }}</span>
            </div>
            
            <div id="summary-products-list" class="products-list-container">
                {{-- Los items del localStorage se inyectan acá de forma dinámica --}}
            </div>
            
            <hr class="summary-divider-premium">
            
            <div class="total-container">
                <span class="total-label-premium">Total General</span>
                <span id="summary-total-price" class="total-amount-premium">$0</span>
            </div>
        </div>

        <div class="apple-card-premium">
            <h2>Información del Cliente</h2>
            <p class="section-subtitle-premium">Verifica tus datos de identidad e ingresa los datos de entrega.</p>
            
            <div class="user-static-fields">
                <div class="info-row-premium">
                    <span class="info-label-premium">Nombre:</span>
                    <span id="user-name" class="info-value-premium">{{ $user->nombre ?? 'Cliente TechCase' }}</span>
                </div>
                <div class="info-row-premium">
                    <span class="info-label-premium">Email:</span>
                    <span id="user-email" class="info-value-premium">{{ $user->correo ?? 'No especificado' }}</span>
                </div>
                <div class="info-row-premium">
                    <span class="info-label-premium">DNI / Documento:</span>
                    <span id="user-dni" class="info-value-premium">{{ $user->documento ?? 'No especificado' }}</span>
                </div>
            </div>

            <hr class="summary-divider-premium">

            <div class="input-group-apple">
                <label for="user-phone">Teléfono (para WhatsApp)</label>
                <input type="text" id="user-phone" class="apple-input" placeholder="Ej: 3794123456">
            </div>

            <div class="input-group-apple">
                <label for="delivery-location">Dirección de Envío</label>
                <textarea id="delivery-location" class="apple-textarea" rows="3" placeholder="Por favor, ingresa detalladamente dónde quieres recibir tu accesorio."></textarea>
            </div>
        </div>

    </div>

    <div class="summary-action-container">
        <button id="btn-send-whatsapp" class="whatsapp-btn-premium">
            <i class="bi bi-whatsapp"></i> Enviar pedido por WhatsApp
        </button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // 1. OBTENER IDENTIFICADOR ÚNICO DE USUARIO (Misma lógica exacta que carrito.js)
    const userMeta = document.querySelector('meta[name="user-id"]');
    const userId = userMeta ? userMeta.getAttribute('content') : 'invitado';
    const storageKey = `carrito_user_${userId}`;

    // Inicializar datos desde LocalStorage usando la clave aislada por usuario
    let carrito = JSON.parse(localStorage.getItem(storageKey)) || [];
    const productsContainer = document.getElementById('summary-products-list');
    const totalPriceEl = document.getElementById('summary-total-price');
    
    const inputLocation = document.getElementById('delivery-location');
    const inputPhone = document.getElementById('user-phone');

    // Helper para formatear dinero
    const formatearMoneda = (valor) => {
        return '$' + new Intl.NumberFormat('es-AR', { minimumFractionDigits: 0 }).format(valor);
    };

    let totalGeneral = 0;

    if (carrito.length === 0) {
        productsContainer.innerHTML = `<p class="text-muted text-center py-4" style="font-size: 14px; font-family: 'Inter', sans-serif;">No hay productos en tu lista.</p>`;
        return;
    }

    // 2. Renderizar la lista de productos estática en la primera tarjeta
    carrito.forEach(item => {
        const itemSubtotal = item.precio * item.cantidad;
        totalGeneral += itemSubtotal;

        const infoDiseno = item.diseno ? ` (Diseño ${item.diseno})` : '';

        const itemRow = document.createElement('div');
        itemRow.className = "product-summary-row";
        
        itemRow.innerHTML = `
            <div class="product-summary-left">
                <img src="${item.imagen}" alt="${item.nombre}" class="product-summary-img">
                <div>
                    <h4 class="product-summary-title">${item.nombre}${infoDiseno}</h4>
                    <p class="product-summary-qty">${item.cantidad} x ${formatearMoneda(item.precio)}</p>
                </div>
            </div>
            <span class="product-summary-subtotal">${formatearMoneda(itemSubtotal)}</span>
        `;
        
        productsContainer.appendChild(itemRow);
    });

    totalPriceEl.innerText = formatearMoneda(totalGeneral);

    // 3. FUNCIÓN INTERNA PARA GENERAR EL TEXTO DE WHATSAPP
    function obtenerMensajeTexto() {
        const orderId = document.getElementById('summary-order-id').innerText;
        const nombreUser = document.getElementById('user-name').innerText;
        const emailUser = document.getElementById('user-email').innerText;
        const dniUser = document.getElementById('user-dni').innerText;
        
        const telefonoVal = inputPhone.value.trim() || '[No ingresado]';
        const ubicacionVal = inputLocation.value.trim() || '[No ingresada]';

        let mensaje = `*¡Hola TechCase! Acabo de realizar un pedido* 📱✨\n\n`;
        mensaje += `*Orden:* ${orderId}\n`;
        mensaje += `----------------------------------\n`;
        mensaje += `*Detalle del Pedido:*\n`;

        carrito.forEach(item => {
            const infoDiseno = item.diseno ? ` (Diseño ${item.diseno})` : '';
            mensaje += `• ${item.cantidad}x ${item.nombre}${infoDiseno} - ${formatearMoneda(item.precio * item.cantidad)}\n`;
        });

        mensaje += `\n*Total a Pagar:* ${formatearMoneda(totalGeneral)}\n`;
        mensaje += `----------------------------------\n`;
        mensaje += `*Datos del Comprador:*\n`;
        mensaje += `• *Nombre:* ${nombreUser}\n`;
        mensaje += `• *Email:* ${emailUser}\n`;
        mensaje += `• *DNI:* ${dniUser}\n`;
        mensaje += `• *Teléfono:* ${telefonoVal}\n\n`;
        mensaje += `📍 *Ubicación para el Envío:*\n${ubicacionVal}\n\n`;
        mensaje += `Quedo a la espera de la confirmación y el código QR para realizar el pago. ¡Muchas gracias!`;

        return mensaje;
    }

    // 4. ACCIÓN DEL BOTÓN DE WHATSAPP
    const btnSend = document.getElementById('btn-send-whatsapp');
    if (btnSend) {
        btnSend.addEventListener('click', () => {
            const ubicacion = inputLocation.value.trim();
            const telefono = inputPhone.value.trim();

            if (!telefono || !ubicacion) {
                alert("Por favor, completa tu teléfono y dirección de envío para poder coordinar la entrega.");
                return;
            }

            const mensajeFinal = obtenerMensajeTexto();
            const telefonoDueno = "5493624075659"; 

            const mensajeCodificado = encodeURIComponent(mensajeFinal);
            const urlWhatsapp = `https://api.whatsapp.com/send?phone=${telefonoDueno}&text=${mensajeCodificado}`;

            // Abrir la pestaña de WhatsApp para despachar el mensaje
            window.open(urlWhatsapp, '_blank');
            
            // Redirigir suavemente al catálogo o principal
            window.location.href = "{{ route('catalogo-fundas') }}";
        });
    }

    // ==========================================
    // 5. LIMPIEZA POST-RENDERING CONTROLADA
    // ==========================================
    // El LocalStorage específico se vacía una vez renderizado todo y SOLO si venimos del redirect exitoso de Laravel
    const indicadorExito = document.getElementById('compra-exitosa-indicador');
    if (indicadorExito) {
        console.log("¡Limpiando almacenamiento local aislado de forma segura!");
        localStorage.removeItem(storageKey);
        // Reseteamos las variables locales para sincronizar los badges globales
        carrito = [];
        const badge = document.getElementById('cart-badge');
        if (badge) badge.style.display = 'none';
    }
});
</script>
@endsection