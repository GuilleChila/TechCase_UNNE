@extends('plantillas.app')
@section('content')
<h1>Preguntas Frecuentes</h1>
<div class="accordion accordion-flush mt-4" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Como se que modelo de iphone tengo?
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">1.Entrá en Ajustes de tu celu. 2.Tocá la opción <stong>"General"</strong> y luego en <stong> "Informacion" </stong>.Ahí vas a encontrar el modelo exacto.
💡 Es clave que selecciones bien el modelo, ya que algunos tienen variantes similares. Si tenés dudas, escribinos y te damos una mano. </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Como compro online?
    </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">no lo se  </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        Hacen envios a todo el pais?
    </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Sí! Enviamos a toda Argentina a través de:

Andreani (retiro en sucursal o envío a domicilio)
Cadetería local (sólo para corrientes)</div>
  </div>

<div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapsefour">
        Que metodos de pagos aceptan?
    </button>
    </h2>
    <div id="flush-collapsefour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Podés pagar con:
    1.Efectivo
    2.Mercado Pago
    3.Transferencia bancaria
    🕐 Si elegís transferencia, tenés 5 días hábiles para realizar el pago y enviarnos el comprobante por mail. Después de ese plazo, el pedido se cancela automáticamente.   </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefive" aria-expanded="false" aria-controls="flush-collapsefive">
        Cuanto demora el envio?
    </button>
    </h2>
    <div id="flush-collapsefive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">El envio puede demorar entre 2 a 5 dias habiles </div>
  </div>
   <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsesix" aria-expanded="false" aria-controls="flush-collapsesix">
        Quien puede recibir mi pedido?
    </button>
    </h2>
    <div id="flush-collapsesix" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        cadeteria local: Cualquier persona en el domicilio indicado.
        Andriani: Presentando copia o foto del DNI del titular.   </div>
  </div>
   <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseseven" aria-expanded="false" aria-controls="flush-collapseseven">
        Queres cambiar o devolver tu pedido?
    </button>
    </h2>
    <div id="flush-collapseseven" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">¡Podés hacerlo sin problema!
Tenés 30 días de garantía desde que recibís tu producto. Si necesitás iniciar un cambio o devolución, escribinos a .....

📌 Recordá que:

Las pequeñas diferencias de color, diseño o detalles mínimos no se consideran fallas.

No podemos cambiar productos dañados por caídas, rayones o mal uso.

  </div>
  </div>
   <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseeight" aria-expanded="false" aria-controls="flush-collapseeight">
        Que pasa si el producto llega dañado o no es el correcto?
    </button>
    </h2>
    <div id="flush-collapseeight" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body p-0">ella me llama y no se que hacer  </div>
  </div>
</div>

<div class="card mt-4" style="width: 69rem;">
  <div class="card-body">
    <h2 class="card-title mt-5">Te quedo alguna duda?</h2>
    <p>dejanos saber tus dudas 👉
     <a href="https://techcase_unne.test/contacto" class="">
     <b>contacto</b>
</a>
</p>
  </div>
</div>
@endsection
