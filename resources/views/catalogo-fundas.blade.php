@extends('plantillas.app')
@section('content')
<div class="container">
<h1>catalogo de <b>Fundas</b></h1>
    <div class="row">
        @foreach ($fundas as $funda)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('img/' . $funda['imagen']) }}" class="card-img-top" alt="{{ $funda['modelo'] }}">
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $funda['modelo'] }}</h5>
                        <p class="text-muted small">{{ $funda['marca'] }}</p>
                        <p class="card-text">{{ $funda['descripcion'] }}</p>
                    </div>
                    
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <span class="fw-bold text-primary">${{ number_format($funda['precio'], 2, ',', '.') }}</span>
                        <a href="#" class="btn btn-outline-dark btn-sm">Ver más</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection