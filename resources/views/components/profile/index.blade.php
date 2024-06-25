<x-html>
    @pushOnce('links')
        <link rel="stylesheet" href="{{ asset('css/profile/index.css') }}">
    @endPushOnce

    <x-header />

    <main class="screen-size contenido-main flex justify-center md:justify-between gap-x-4">
        {{-- <livewire:profile.profile-section /> --}}
        <x-profile.profile-nav />
        <div class="max-w-sm min-w-80 md:max-w-xl">
            {{$slot}}
        </div>
        <x-publicidad-lateral>
            <a href="#">
                <img class="h-full w-full" src="{{asset('images/publicity.png')}}" alt="">
            </a>
        </x-publicidad-lateral>
    </main>

</x-html>
