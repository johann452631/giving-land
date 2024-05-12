<x-html>
    @pushOnce('links')
        <link rel="stylesheet" href="{{ asset('css/profile-index.css') }}">
    @endPushOnce

    <x-navigation-header />
    <div class="contenido-main screen-size">
        <livewire:profile-nav/>
        <livewire:profile-section/>
        <x-publicidad-lateral />
    </div>

    {{-- <x-profile-index :$profile>
        @switch($section)
            @case('profile')
                @pushOnce('links')
                    <link rel="stylesheet" href="{{ asset('css/profile-show.css') }}">
                @endPushOnce
                @include('sections.profile.show')
            @break

            @case('favorites')
                <div>
                    <h1 class="text-2xl">publicaciones guardadas</h1>
                </div>
            @break

            @case('settlements-history')
                <div>
                    <h1 class="text-2xl">Historial de movimientos</h1>
                </div>
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
        @endswitch

    </x-profile-index> --}}

</x-html>
