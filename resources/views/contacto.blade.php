@extends('plantillas.app')
@section('content')
<div class= "titulo-contacto">
    <h2>Formulario de Contacto</h2>
</div>
<section  class="form-contacto" >

<div class="form-container">
    <form action="/enviar-contacto" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre completo</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
        </div>

        <div class="form-group">
            <label for="correo">Correo electrónico</label>
            <input type="email" id="correo" name="correo" placeholder="ejemplo@correo.com" required>
        </div>

        <div class="form-group">
            <label for="telefono">Número de teléfono</label>
            <input type="tel" id="telefono" name="telefono" placeholder="Ej: +54 9 11 1234 5678">
        </div>

        <div class="form-group">
            <label for="motivo">Motivo de la consulta</label>
            <select id="motivo" name="motivo" required>
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="ventas">Ventas / Compras</option>
                <option value="soporte">Soporte Técnico</option>
                <option value="envios">Estado de Envío</option>
                <option value="otros">Otros</option>
            </select>
        </div>

        <div class="form-group">
            <label for="mensaje">Detalles de la consulta</label>
            <textarea id="mensaje" name="mensaje" rows="4" placeholder="Escribe tu duda aquí..."></textarea>
        </div>

        <button type="submit" class="btn-submit">Enviar consulta</button>
        
    </form>
</div>

</section>
@endsection