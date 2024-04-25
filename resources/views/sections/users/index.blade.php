@extends('layouts.html')
@section('content')
    @pushOnce('links')
        <link rel="stylesheet" href="{{ asset('css/user-index.css') }}">
    @endPushOnce
    <x-navigation-header />
    <div class="contenido-main">
        <div class="menu-opciones-lateral">
            <a class="inline-block boton-base verde-blanco" href="">Publicar artículo</a>
            <ul class="mt-3">
                <li class="hover-gris-claro p-2 rounded">
                    <a href="">
                        <img src="" alt="">
                    </a>
                </li>
                <li class="hover-gris-claro p-2 rounded">
                    <a href="">Publicaciones guardadas</a>
                </li>
                <li class="hover-gris-claro p-2 rounded">
                    <a href="">Historial de movimientos</a>
                </li>
                <li class="hover-gris-claro p-2 rounded">
                    <a href="">Seguridad y privacidad</a>
                </li>
            </ul>
        </div>
        @yield($yield)
        <x-publicidad-lateral />
    </div>
@endsection
