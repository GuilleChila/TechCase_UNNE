@extends('plantillas.app')
@section('content')
<section>
  <div class= "bienvenida contenedor">
      <h1>Bienvenido a <b>TechCase</b></h1>
      <p>En nuestra tienda, transformamos tu iPhone en un reflejo de tu personalidad. Te ofrecemos una selección exclusiva de fundas, cargadores y comecables diseñados no solo para proteger y potenciar tu dispositivo, sino para que cada detalle hable de ti. Dale a tu teléfono ese toque único y personalízalo exactamente a tu gusto con nuestros accesorios.</p>
  </div>
</section>

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
    <section class="container mt-5">
      <h2>Conocé las categorias de nuestros <b>productos</b></h2>
      <div class="row">

      <div class="col-md-4 mb-4">
        <a href="{{ route('catalogo-fundas') }}" class="text-decoration-none">
          <div class="card categoria-card-moderna"> 
            <div class="contenedor-img">
            <img src="{{ asset('img/tarjeta_funda.jpg') }}" class="img-fluida" alt="Fundas">
            </div>
            <div class="card-img-overlay d-flex align-items-end justify-content-center">
                <h5 class="card-title text-white"><b>Fundas</b></h5>
            </div>
        </a>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <a href="{{ route('catalogo-cargadores') }}" class="text-decoration-none">
        <div class="card categoria-card-moderna"> 
          <div class="contenedor-img">
            <img src="{{ asset('img/tarjeta_cargadores.jpg') }}" class="img-fluida" alt="Fundas">
          </div>
          <div class="card-img-overlay d-flex align-items-end justify-content-center">
                <h5 class="card-title text-white"><b>Cargadores</b></h5>
        </div>
        </a>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <a href="{{ route('catalogo-cargadores') }}" class="text-decoration-none">
        <div class="card categoria-card-moderna"> 
          <div class="contenedor-img">
            <img src="{{ asset('img/tarjeta_comecable.jpg') }}" class="img-fluida" alt="Fundas">
          </div>
          <div class="card-img-overlay d-flex align-items-end justify-content-center">
                <h5 class="card-title text-white"><b>ComeCables</b></h5>
        </div>
        </a>
      </div>
    </div>
</section>

<section class="instagram-section container-sm">
  <div class="insta-header">
    <h2>¡Siguenos en Instagram!</h2>
    <p class="insta-subtitle">Para ver nuestras publicaciones destacadas</p>
    </div>
    <div class="insta-user">
      <i class="fab fa-instagram"></i>
       <a href="https://www.instagram.com/tech.case__?igsh=ZG1iNTlva2M0ZGFv" target="_blank" class="seguinos-link"><strong>TechCase__</strong></a>
  </div>

  <div class="insta-grid">
    <a href="https://www.instagram.com/p/DIFEBqWPL5l/?hl=es-la" target="_blank" class="insta-item">
      <img src="{{ asset('img/postIG1.png') }}" alt="Funda para teléfono">
    </a>
    
    <a href="https://www.instagram.com/p/DIFEGauPQJ1/?hl=es-la" target="_blank" class="insta-item">
      <img src="{{ asset('img/postIG2.png') }}" alt="Funda para teléfono">
    </a>

    <a href="https://www.instagram.com/p/DIFEITSPfdt/?hl=es-la" target="_blank" class="insta-item">
      <img src="{{ asset('img/postIG3.png') }}" alt="Funda para teléfono">
    </a>

    <a href="https://www.instagram.com/p/DJqFeVcuFXZ/?hl=es-la" target="_blank" class="insta-item">
      <img src="{{ asset('img/postIG4.png') }}" alt="Funda para teléfono">
    </a>

    </div>
</section>
@endsection