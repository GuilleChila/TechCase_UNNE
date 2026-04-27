@extends('plantillas.app')
@section('content')
<div class="legal-container">
    <h1 class="legal-title">Términos y Condiciones</h1>
    <p class="legal-intro">Última actualización: Abril 2026. Al utilizar TechCase, aceptas los siguientes términos diseñados para garantizar una compra segura y transparente.</p>

    <div class="accordion-legal">
        <div class="legal-item">
            <button class="legal-trigger">1. Protección de Datos (Ley 25.326)</button>
            <div class="legal-content">
                <p>Tus datos personales están protegidos bajo la <strong>Ley Nacional de Protección de Datos Personales Nº 25.326</strong>. TechCase garantiza que la información recolectada se utiliza exclusivamente para el procesamiento del pedido y no será compartida con terceros sin consentimiento previo.</p>
            </div>
        </div>

        <div class="legal-item">
            <button class="legal-trigger">2. Proceso de Pago y WhatsApp</button>
            <div class="legal-content">
                <p>El proceso de compra en TechCase es transparente y directo:</p>
                <ul>
                    <li>Al finalizar el carrito, se enviará un mensaje automático a nuestro WhatsApp con el detalle de los productos.</li>
                    <li>Los pagos se realizan mediante <strong>Billeteras Virtuales (QR)</strong> con autorización previa del comerciante.</li>
                    <li>No existen costos ocultos ni ambigüedades en el precio final detallado.</li>
                </ul>
            </div>
        </div>

        <div class="legal-item">
            <button class="legal-trigger">3. Envíos y Retiros</button>
            <div class="legal-content">
                <p><strong>Logística:</strong> Los envíos se realizan a través de Uber Moto. La responsabilidad de TechCase finaliza al entregar el producto al transportista.</p>
                <p><strong>Retiros:</strong> En caso de retiro en local, se permiten devoluciones o cambios únicamente presentando el comprobante de transacción digital.</p>
            </div>
        </div>

        <div class="legal-item">
            <button class="legal-trigger">4. Garantía y Defensa del Consumidor</button>
            <div class="legal-content">
                <p>Cumplimos estrictamente con la <strong>Ley de Defensa del Consumidor (Ley 24.240)</strong>:</p>
                <ul>
                    <li><strong>Garantía:</strong> 48 horas corridas para fallas de fábrica certificadas.</li>
                    <li><strong>Derecho de Revocación:</strong> Posibilidad de cancelar la operación según términos legales vigentes para e-commerce.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll('.legal-trigger').forEach(button => {
        button.addEventListener('click', () => {
            const content = button.nextElementSibling;
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    });
</script>
@endsection