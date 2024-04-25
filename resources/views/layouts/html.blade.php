<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $tituloPagina }}</title>
    @vite('resources/css/app.css')
    @livewireStyles
    <link rel="stylesheet" href={{ asset('css/global.css') }}>
    <link rel="icon" type="image/svg+xml" href="{{asset('appicons/logo-sm.svg')}}">
    @stack('links')
</head>

<body>
    @yield('content')
    @livewireScripts
    {{-- @session('alert')
        <x-alert :message="$value['message']" class="alerta-{{ $value['type'] }}" id="divAlert">
        </x-alert>
        <script>
            divAlert = document.getElementById('divAlert');
            setTimeout(function() {
                divAlert.remove();
            }, 3500);
        </script>
    @endsession --}}
    @session('alert')
        <x-alert2 type="{{ $value['type'] }}" id="divAlert">
            <p>{{$value['message']}}</p>
        </x-alert2>
        {{-- <script>
            divAlert = document.getElementById('divAlert');
            setTimeout(function() {
                divAlert.remove();
            }, 3500);
        </script> --}}
    @endsession
    @stack('scripts')
    <script src={{ asset('js/global.js') }}></script>
    <script src="https://kit.fontawesome.com/0062b0aa7f.js" crossorigin="anonymous"></script>
</body>

</html>
