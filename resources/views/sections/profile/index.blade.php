<x-html>
    @pushOnce('links')
        <link rel="stylesheet" href="{{ asset('css/profile-index.css') }}">
    @endPushOnce

    <x-navigation-header />
    <div class="contenido-main screen-size">
        <livewire:profile.profile-nav/>
        <livewire:profile.profile-section/>
        <x-publicidad-lateral />
    </div>

</x-html>
