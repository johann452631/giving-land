<x-html>
    @pushOnce('links')
        <link rel="stylesheet" href="{{ asset('css/profile/index.css') }}">
    @endPushOnce

    @persist('header')
        <x-header />
    @endpersist

    <div class="contenido-main screen-size">
        {{-- <livewire:profile.profile-section /> --}}
        <div>
            @auth
                <livewire:profile.profile-nav :$profile :$section />
            @endauth
        </div>
        <div>
            @switch($section)
                @case('favorites')
                    <div>publicaciones guardadas</div>
                @break

                @case('settlements-history')
                    <div>Historial de movimientos</div>
                @break

                @case('security-privacy')
                    <div class="mt-4">
                        <a href="">Actualizar datos personales</a>
                        <hr class="my-4">
                        <a href="">Cambiar contraseña</a>
                        <hr class="my-4">
                        <a href="">Eliminar cuenta</a>
                    </div>
                @break

                @default
                    @include('sections.profile.show')
            @endswitch
        </div>
        <x-publicidad-lateral />
    </div>

</x-html>
