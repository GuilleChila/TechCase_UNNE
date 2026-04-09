<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechCase</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="{{ asset('vendor/css/bootstrap.min.css') }}"> 

</head>
<body>
    <div class="cabecera">
            <h1>TechCase</h1>
            <h2>Fundas y Accesorios para Celulares</h2>
            <nav class="navbar">
        <a href="/principal">principal</a>
        <a href="/sobre-nosotros">Sobre Nosotros</a>
    </nav>
    </div>
    <div class="container-md">
        <h2>Tendencias: </h2>
        <div id="carouselExampleFade" class="carousel slide carousel-fade">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('img/ej trendy 1.jpg') }}" class="d-block w-100" alt="..." style= "max-height: 350px">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/ej trendy 2.jpg') }}" class="d-block w-100" alt="..." style= "max-height: 350px">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/ej trendy 3.jpg') }}" class="d-block w-100" alt="..." style= "max-height: 350px">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/ej trendy 4.jpg') }}" class="d-block w-100" alt="..." style= "max-height: 350px">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
    </div>
<script src="{{ asset('vendor/js/bootstrap.bundle.min.js') }}"> </script> 
</body>
</html> 