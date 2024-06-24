<x-html>
    @pushOnce('links')
        <link rel="stylesheet" href="{{ asset('css/profile/index.css') }}">
    @endPushOnce

    @persist('header')
        <x-header />
    @endpersist

    <main class="screen-size contenido-main flex justify-center md:justify-between gap-x-4">
        {{-- <livewire:profile.profile-section /> --}}
        <livewire:profile.profile-nav />
        <div class="max-w-xl min-w-80">
            {{$slot}}
        </div>
        <x-publicidad-lateral>
            <a href="#">
                <img class="h-full w-full" src="{{asset('images/publicity.png')}}" alt="">
            </a>
        </x-publicidad-lateral>
    </main>

</x-html>
