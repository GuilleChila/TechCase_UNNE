@extends('plantillas.app')
@section('content')
<div class="container mt-0">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10">
            
            <h2 class="text-center titulo-seccion">Preguntas Frecuentes</h2>

            <div class="accordion accordion-flush shadow-sm border rounded" id="accordionFlushExample">
                
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#f1">
                            ¿Como sé que modelo de iphone tengo?
                        </button>
                    </h2>
                    <div id="f1" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            1. Entrá en Ajustes de tu celu. <br>
                            2. Tocá la opción <strong>"General"</strong> y luego en <strong>"Informacion"</strong>. Ahí vas a encontrar el modelo exacto.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#f2">
                            ¿Cómo compro online?
                        </button>
                    </h2>
                    <div id="f2" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Seleccioná tus productos, cargalos al carrito y seguí los pasos de pago.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#f3">
                            ¿Hacen envíos a todo el país?
                        </button>
                    </h2>
                    <div id="f3" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">¡Sí! Enviamos a toda Argentina vía Andreani y cadetería local en Corrientes y Resistencia.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#f4">
                            ¿Qué métodos de pagos aceptan?
                        </button>
                    </h2>
                    <div id="f4" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Aceptamos: Efectivo, Mercado Pago y Transferencia bancaria.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#f5">
                            ¿Cuánto demora el envío?
                        </button>
                    </h2>
                    <div id="f5" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">El envío puede demorar entre 2 a 5 días hábiles.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#f6">
                            ¿Quien puede recibir mi pedido?
                        </button>
                    </h2>
                    <div id="f6" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Cualquier persona en el domicilio para cadetería local, o el titular con DNI para Andreani.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#f7">
                            ¿Queres cambiar o devolver tu pedido?
                        </button>
                    </h2>
                    <div id="f7" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">¡Podés hacerlo sin problema! Tenés 30 días de garantía desde que recibís tu producto.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#f8">
                            ¿Que pasa si el producto llega dañado o no es el correcto?
                        </button>
                    </h2>
                    <div id="f8" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Ella me llama y no se que hacer... pero vos escribinos y te lo solucionamos al toque.</div>
                    </div>
                </div>

            </div>

            <div class="card mt-5 text-center border-0 bg-light">
                <div class="card-body">
                    <h2 class="card-title">¿Te quedo alguna duda?</h2>
                    <p class="card-text">dejanos saber tus dudas 👉 <a href="/contacto" class="fw-bold text-decoration-none">contacto</a></p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
