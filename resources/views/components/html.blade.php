@props(['tituloPagina' => 'Giving-Land'])
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $tituloPagina }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @livewireStyles
    <link rel="stylesheet" href={{ asset('css/global.css') }}>
    <link rel="icon" type="image/svg+xml" href="{{ asset('appicons/logo-sm.svg') }}">
    <script src={{ asset('js/global.js') }}></script>
    @stack('links')
</head>

<body>
    <livewire:alert />
    @session('alert')
        <x-alert :type="$value['type']" :message="$value['message']" id="divAlert" />
    @endsession

    {{ $slot }}

    @stack('modals')

    @livewireScripts

    @stack('scripts')
    <script src="https://kit.fontawesome.com/0062b0aa7f.js" crossorigin="anonymous"></script>
</body>

</html>
