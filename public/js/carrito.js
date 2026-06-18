document.addEventListener('DOMContentLoaded', () => {
    console.log("¡Script de carrito de TechCase cargado correctamente!");

    // 1. OBTENER IDENTIFICADOR ÚNICO DE USUARIO
    // Buscamos el ID del usuario autenticado desde la meta tag del HTML
    const userMeta = document.querySelector('meta[name="user-id"]');
    const userId = userMeta ? userMeta.getAttribute('content') : 'invitado';
    
    // La clave ahora cambia dinámicamente según el usuario logueado para aislar los carritos
    const storageKey = `carrito_user_${userId}`;

    // Inicializar carrito desde LocalStorage usando la clave única por usuario
    let carrito = JSON.parse(localStorage.getItem(storageKey)) || [];

    // Helper para formatear dinero (Ej: 5500 -> $5.500)
    const formatearMoneda = (valor) => {
        return '$' + new Intl.NumberFormat('es-AR', { minimumFractionDigits: 0 }).format(valor);
    };

    // ==========================================
    // 1. CONTROL DE CANTIDADES EN LAS TARJETAS / DETALLES
    // ==========================================
    const productCards = document.querySelectorAll('.product-card');
    console.log(`Se encontraron ${productCards.length} elementos de producto.`);

    productCards.forEach(card => {
        const btnMinus = card.querySelector('.quantity-btn.minus');
        const btnPlus = card.querySelector('.quantity-btn.plus');
        const inputQuantity = card.querySelector('.quantity-input');
        const btnAddToCart = card.querySelector('.add-to-cart-btn');

        // Atributos dinámicos polimórficos
        const stockMax = parseInt(card.dataset.stock) || 0;
        const productoId = card.dataset.id;
        const tipoProducto = card.dataset.tipo || 'funda'; // 'funda', 'cargador' o 'comecable'

        if (btnPlus && inputQuantity) {
            btnPlus.addEventListener('click', (e) => {
                e.preventDefault();
                let qty = parseInt(inputQuantity.value) || 1;
                
                // Buscamos cuántas unidades de este producto (del mismo tipo) ya están en el carrito
                const enCarrito = carrito
                    .filter(item => item.id === productoId && item.tipo === tipoProducto)
                    .reduce((total, item) => total + item.cantidad, 0);
                
                const disponibleReal = stockMax - enCarrito;

                if (qty < disponibleReal) {
                    let nuevoValor = qty + 1;
                    inputQuantity.value = nuevoValor;
                    inputQuantity.setAttribute('value', nuevoValor);
                } else {
                    alert(`No puedes agregar más unidades. El stock máximo disponible es de ${stockMax} y ya tienes ${enCarrito} en tu carrito.`);
                }
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
                
                // Buscamos si hay un diseño seleccionado dentro de esta tarjeta/detalle (aplica a fundas)
                const disenoSeleccionado = card.querySelector('input[name="diseno"]:checked');
                const diseno = disenoSeleccionado ? disenoSeleccionado.value : null;
                const cantidadAAnadir = parseInt(inputQuantity.value) || 1;

                // Validamos el stock acumulado global de este ID y tipo para no romper los límites
                const enCarrito = carrito
                    .filter(item => item.id === productoId && item.tipo === tipoProducto)
                    .reduce((total, item) => total + item.cantidad, 0);
                
                if ((enCarrito + cantidadAAnadir) > stockMax) {
                    alert(`Error: No puedes superar el stock máximo de ${stockMax} unidades.`);
                    return;
                }

                // Estructura de producto omnipotente y genérica
                const producto = {
                    id: productoId,
                    tipo: tipoProducto,
                    nombre: card.dataset.nombre,
                    precio: parseFloat(card.dataset.precio),
                    imagen: card.dataset.imagen,
                    cantidad: cantidadAAnadir,
                    diseno: diseno, // Guardará el número (ej: "1") o null si es cargador/comecable
                    stock: stockMax   // Persistimos el stock máximo para leerlo desde la vista del carrito
                };

                agregarAlCarrito(producto);
                
                // Reiniciamos el selector visual de la tarjeta a 1
                if (inputQuantity) {
                    inputQuantity.value = 1; 
                    inputQuantity.setAttribute('value', 1);
                }
            });
        }
    });

    // ==========================================
    // 2. LÓGICA DEL CARRITO (GESTIÓN DE DATOS)
    // ==========================================
    function agregarAlCarrito(itemNuevo) {
        // Para verificar duplicados consideramos ID, Tipo y Diseño (así se separan los diseños de una misma funda)
        const existe = carrito.find(item => 
            item.id === itemNuevo.id && 
            item.tipo === itemNuevo.tipo && 
            item.diseno === itemNuevo.diseno
        );

        if (existe) {
            if ((existe.cantidad + itemNuevo.cantidad) <= itemNuevo.stock) {
                existe.cantidad += itemNuevo.cantidad;
            } else {
                alert(`No se pudo añadir. Superarías el stock disponible de ${itemNuevo.stock} unidades.`);
                return;
            }
        } else {
            carrito.push(itemNuevo);
        }

        guardarYActualizar();
        const textoDiseno = itemNuevo.diseno ? ` (Diseño ${itemNuevo.diseno})` : '';
        alert(`¡Agregado al carrito: ${itemNuevo.cantidad}x ${itemNuevo.nombre}${textoDiseno}!`);
    }

    function guardarYActualizar() {
        localStorage.setItem(storageKey, JSON.stringify(carrito));
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
        // para que no rompa las demás páginas (como los catálogos)
        if (!container || !subtotalEl || !totalEl) {
            return; 
        }

        if (carrito.length === 0) {
            container.innerHTML = `<p class="text-muted text-center py-5">Tu carrito está vacío.</p>`;
            subtotalEl.innerText = formatearMoneda(0);
            totalEl.innerText = formatearMoneda(0);
            return;
        }

        let htmlContenido = '';
        let subtotalGeneral = 0;

        carrito.forEach((item, index) => {
            const subtotalItem = item.precio * item.cantidad;
            subtotalGeneral += subtotalItem;

            // Si tiene variante de diseño, la mostramos elegantemente
            const infoDiseno = item.diseno 
                ? `<p class="item-variant text-muted mb-1">Diseño elegido: <b>${item.diseno}</b></p>` 
                : '';

            htmlContenido += `
                <div class="cart-item" data-index="${index}">
                    <div class="item-img">
                        <img src="${item.imagen}" alt="${item.nombre}">
                    </div>
                    <div class="item-details">
                        <h3>${item.nombre}</h3>
                        
                        ${infoDiseno}
                        
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
                    const item = carrito[index];
                    
                    // Validamos que no supere el stock que guardamos en el objeto original
                    if (item.cantidad < item.stock) {
                        item.cantidad += 1;
                        guardarYActualizar();
                    } else {
                        alert(`No puedes agregar más unidades. El stock disponible actual es de ${item.stock}.`);
                    }
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

    // Ejecución inicial preventiva de renderizado y burbuja
    renderizarCarrito();
    actualizarNavbarBadge();

    // ==========================================
    // 4. ENVÍO DEL CARRITO AL CONTROLADOR
    // ==========================================
    const formCheckout = document.getElementById('form-finalizar-compra');
    if (formCheckout) {
        formCheckout.addEventListener('submit', (e) => {
            const inputDatos = document.getElementById('carrito-datos-input');
            
            if (carrito.length === 0) {
                e.preventDefault();
                alert("Tu carrito está vacío. Añade productos antes de finalizar tu compra.");
                return;
            }
            
            // Convertimos el array 'carrito' completo a texto JSON para que Laravel lo pueda leer
            inputDatos.value = JSON.stringify(carrito); 
        });
    }

    // Si la compra fue exitosa (indicada por el backend en la sesión o URL), borramos el localStorage específico
    const indicadorExito = document.getElementById('compra-exitosa-indicador');
    if (indicadorExito) {
        console.log("¡Compra exitosa confirmada");
        localStorage.removeItem(storageKey);
        carrito = [];
        actualizarNavbarBadge();
        renderizarCarrito();
    }
});