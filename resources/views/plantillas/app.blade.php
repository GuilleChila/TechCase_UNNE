<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechCase</title>
    <link href="{{ asset('vendor/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('parciales.cabecera')
    <main class="container my-4">
    @yield('content')
    </main>
    @include('parciales.pie-pagina')
    <script src="{{ asset('vendor/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>