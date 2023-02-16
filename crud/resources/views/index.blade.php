<!-- CARGAR JQUERY PARA EL FRONT -->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Ejercicio de CRUD</title>
        <!-- Scripts -->
        <script src="{{ asset('./js/app.js') }}" defer></script>
	    <script src="{{ asset('./npmjs/main.js') }}"></script> 
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <!-- Styles -->
        <link href="{{ asset('./css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('./css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        @yield('content')
    </body>
</html>
