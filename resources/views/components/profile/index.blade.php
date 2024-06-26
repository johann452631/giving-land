<x-html>
    @pushOnce('links')
        <link rel="stylesheet" href="{{ asset('css/profile/index.css') }}">
    @endPushOnce

    <x-header />

    <main class="screen-size contenido-main flex justify-center md:justify-between gap-x-4">
        {{-- <livewire:profile.profile-section /> --}}
        <x-profile.profile-nav />

        {{ $slot }}
        
        <x-publicidad-lateral />
    </main>

    <x-footer />

</x-html>
