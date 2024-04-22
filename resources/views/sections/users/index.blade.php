@extends('layouts.html')
@section('content')
    @pushOnce('links')
        <link rel="stylesheet" href="{{ asset('css/user-index.css') }}">
    @endPushOnce
    <x-navigation-header />
    <div class="contenido-main">
        <div class="menu-opciones-lateral">
            <a class="inline-block boton-base verde-blanco text-center" href="">Publicar artículo</a>
            <nav class="">
                <ul class="text-center">
                    <li>
                        <a class="inline-block boton-base" href="">Publicaciones guardadas</a>
                    </li>
                    <li>
                        <a class="inline-block boton-base" href="">Historial de movimientos</a>
                    </li>
                    <li>
                        <a class="inline-block boton-base" href="">Seguridad y privacidad</a>
                    </li>
                </ul>
            </nav>
        </div>
        @yield($yield)
        <x-publicidad-lateral />
    </div>
@endsection
