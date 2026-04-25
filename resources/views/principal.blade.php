@extends('plantillas.app')
@section('content')
<section>
  <div class= "bienvenida contenedor">
      <h1>Bienvenido a <b>TechCase</b></h1>
      <p>En nuestra tienda, transformamos tu iPhone en un reflejo de tu personalidad. Te ofrecemos una selección exclusiva de fundas, cargadores y comecables diseñados no solo para proteger y potenciar tu dispositivo, sino para que cada detalle hable de ti. Dale a tu teléfono ese toque único y personalízalo exactamente a tu gusto con nuestros accesorios.</p>
  </div>
</section>
<section class= "container">
  <div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('img/paso1 techcase.png') }}" class="d-block w-100" alt="..." style= "max-height: 300px">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/paso2 techcase.png') }}" class="d-block w-100" alt="..." style= "max-height: 300px">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/paso3 techcase.png') }}" class="d-block w-100" alt="..." style= "max-height: 300px">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
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
          <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <img src="{{ asset('img/tarjeta_funda.jpg') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><b>Fundas</b></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                <a href="{{ route('catalogo-fundas') }}" class="btn btn-primary">Ver catalogo</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <img src="{{ asset('img/tarjeta_cargadores.jpg') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><b>Cargadores</b></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <img src="{{ asset('img/tarjeta_comecable.jpg') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><b>ComeCables</b></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection