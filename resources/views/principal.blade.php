@extends('plantillas.app')
@section('content')
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
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <img src="{{ asset('img/tarjeta_funda.jpg') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Fundas</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <img src="{{ asset('img/tarjeta_cargadores.jpg') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Cargadores</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <img src="{{ asset('img/tarjeta_comecable.jpg') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">ComeCables</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection