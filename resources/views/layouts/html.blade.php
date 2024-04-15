<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $tituloPagina }}</title>
    <link rel="stylesheet" href={{ asset('css/global.css') }}>
    @stack('links')
    @vite('resources/css/app.css')
</head>

<body>
    @yield('content')

    @session('alert')
        <x-alert :message="$value['message']" class="alerta-{{ $value['type'] }}" id="divAlert">
        </x-alert>
        <script>
            divAlert = document.getElementById('divAlert');
            setTimeout(function() {
                divAlert.remove();
            }, 3500);
        </script>
    @endsession
    <script src={{ asset('js/global.js') }}></script>
</body>

</html>
