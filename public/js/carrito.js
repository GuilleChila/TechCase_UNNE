document.addEventListener('DOMContentLoaded', () => {
    console.log("¡Script de carrito cargado correctamente!");

    // Inicializar carrito desde LocalStorage
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

    // Helper para formatear dinero (Ej: 5500 -> $5.500)
    const formatearMoneda = (valor) => {
        return '$' + new Intl.NumberFormat('es-AR', { minimumFractionDigits: 0 }).format(valor);
    };

    // ==========================================
    // 1. CONTROL DE CANTIDADES EN LAS TARJETAS
    // ==========================================
    const productCards = document.querySelectorAll('.product-card');
    console.log(`Se encontraron ${productCards.length} tarjetas de producto.`);

    productCards.forEach(card => {
        const btnMinus = card.querySelector('.quantity-btn.minus');
        const btnPlus = card.querySelector('.quantity-btn.plus');
        const inputQuantity = card.querySelector('.quantity-input');
        const btnAddToCart = card.querySelector('.add-to-cart-btn');

        if (btnPlus && inputQuantity) {
            btnPlus.addEventListener('click', (e) => {
                e.preventDefault();
                let qty = parseInt(inputQuantity.value) || 1;
                let nuevoValor = qty + 1;
                
                // Forzamos la actualización en memoria y en el HTML visual
                inputQuantity.value = nuevoValor;
                inputQuantity.setAttribute('value', nuevoValor);
            });
        }

        if (btnMinus && inputQuantity) {
            btnMinus.addEventListener('click', (e) => {
                e.preventDefault();
                let qty = parseInt(inputQuantity.value) || 1;
                if (qty > 1) { 
                    let nuevoValor = qty - 1;
                    
                    // Forzamos la actualización en memoria y en el HTML visual
                    inputQuantity.value = nuevoValor;
                    inputQuantity.setAttribute('value', nuevoValor);
                }
            });
        }

        if (btnAddToCart) {
            btnAddToCart.addEventListener('click', (e) => {
                e.preventDefault();
                const producto = {
                    id: card.dataset.id,
                    nombre: card.dataset.nombre,
                    precio: parseFloat(card.dataset.precio),
                    imagen: card.dataset.imagen,
                    cantidad: parseInt(inputQuantity.value) || 1
                };

                agregarAlCarrito(producto);
                
                // Reiniciamos al valor inicial de forma segura
                inputQuantity.value = 1; 
                inputQuantity.setAttribute('value', 1);
            });
        }
    });

    // ==========================================
    // 2. LÓGICA DEL CARRITO (GESTIÓN DE DATOS)
    // ==========================================
    function agregarAlCarrito(itemNuevo) {
        const existe = carrito.find(item => item.id === itemNuevo.id);

        if (existe) {
            existe.cantidad += itemNuevo.cantidad;
        } else {
            carrito.push(itemNuevo);
        }

        guardarYActualizar();
        alert(`¡Agregado al carrito: ${itemNuevo.cantidad}x ${itemNuevo.nombre}!`);
    }

    function guardarYActualizar() {
        localStorage.setItem('carrito', JSON.stringify(carrito));
        renderizarCarrito();
        actualizarNavbarBadge();
    }

    function actualizarNavbarBadge() {
        const badge = document.getElementById('cart-badge');
        
        // Si por alguna razón no existe el badge en el DOM, evitamos errores
        if (!badge) return;

        // Sumamos todas las cantidades de los productos que están en el arreglo 'carrito'
        const totalProductos = carrito.reduce((total, item) => total + item.cantidad, 0);

        // Asignamos el total al texto del badge
        badge.innerText = totalProductos;

        // Estética: Si no hay productos, ocultamos la burbuja roja para mantener el diseño limpio
        if (totalProductos === 0) {
            badge.style.display = 'none';
        } else {
            badge.style.display = 'inline-block';
        }
    }

    // ==========================================
    // 3. RENDERIZAR LA VISTA DEL CARRITO
    // ==========================================
    function renderizarCarrito() {
        const container = document.getElementById('cart-items-container');
        const subtotalEl = document.getElementById('cart-subtotal');
        const totalEl = document.getElementById('cart-total');

        // PROTECCIÓN CRUCIAL: Si no estamos en la página del carrito, frenamos acá 
        // para que no rompa las demás páginas (como el catálogo)
        if (!container || !subtotalEl || !totalEl) {
            return; 
        }

        if (carrito.length === 0) {
            container.innerHTML = `<p class="text-muted text-center py-4">Tu carrito está vacío.</p>`;
            subtotalEl.innerText = formatearMoneda(0);
            totalEl.innerText = formatearMoneda(0);
            return;
        }

        let htmlContenido = '';
        let subtotalGeneral = 0;

        carrito.forEach((item, index) => {
            const subtotalItem = item.precio * item.cantidad;
            subtotalGeneral += subtotalItem;

            htmlContenido += `
                <div class="cart-item" data-index="${index}">
                    <div class="item-img">
                        <img src="${item.imagen}" alt="${item.nombre}">
                    </div>
                    <div class="item-details">
                        <h3>${item.nombre}</h3>
                        <p class="item-variant">Unidades elegidas</p>
                        <div class="item-actions">
                            <div class="quantity-picker">
                                <button class="btn-cart-minus">-</button>
                                <input type="text" value="${item.cantidad}" readonly style="color: #1d1d1f !important; font-weight: 600; text-align: center; width: 32px; height: 100%; border: none; background: transparent; padding: 0; margin: 0; outline: none; font-size: 16px;">
                                <button class="btn-cart-plus">+</button>
                            </div>
                            <button class="btn-remove"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                    <div class="item-price">
                        ${formatearMoneda(subtotalItem)}
                    </div>
                </div>
                <hr class="cart-divider">
            `;
        });

        container.innerHTML = htmlContenido;
        subtotalEl.innerText = formatearMoneda(subtotalGeneral);
        totalEl.innerText = formatearMoneda(subtotalGeneral); 

        asignarEventosCarrito();
    }

    function asignarEventosCarrito() {
        const itemsEv = document.querySelectorAll('.cart-item');

        itemsEv.forEach(itemEl => {
            const index = itemEl.dataset.index;
            const btnMinus = itemEl.querySelector('.btn-cart-minus');
            const btnPlus = itemEl.querySelector('.btn-cart-plus');
            const btnRemove = itemEl.querySelector('.btn-remove');

            if (btnPlus) {
                btnPlus.addEventListener('click', () => {
                    carrito[index].cantidad += 1;
                    guardarYActualizar();
                });
            }

            if (btnMinus) {
                btnMinus.addEventListener('click', () => {
                    if (carrito[index].cantidad > 1) {
                        carrito[index].cantidad -= 1;
                        guardarYActualizar();
                    }
                });
            }

            if (btnRemove) {
                btnRemove.addEventListener('click', () => {
                    carrito.splice(index, 1);
                    guardarYActualizar();
                });
            }
        });
    }

    // Ejecución inicial preventiva
    renderizarCarrito();
    actualizarNavbarBadge();
});