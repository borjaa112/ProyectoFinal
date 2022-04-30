<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agencia Hotelera</title>

    <script src="{{asset('js/app.js')}}" defer></script>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    @yield('head')
</head>
<body>
    @include('partials.hotel.nav')
    @yield('contenido')
    @include('partials.footer')
</body>
</html>

