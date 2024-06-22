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
                <livewire:profile.profile-nav :$section />
            @endauth
        </div>
        <div>
            {{$slot}}
        </div>
        <x-publicidad-lateral />
    </div>

</x-html>
