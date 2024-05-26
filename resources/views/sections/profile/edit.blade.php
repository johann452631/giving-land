<x-html>
    @pushOnce('links')
        <link rel="stylesheet" href="{{ asset('css/profile-edit.css') }}">
    @endPushOnce

    {{-- Header --}}
    <x-header />

    {{-- Main --}}
    <div class="contenido-main">
        <div class="bg-gris-claro rounded p-10 max-w-xl my-0 mx-auto">
            <livewire:profile.edit.profile-img />
            <hr class="my-4">
            <livewire:profile.edit.social-media />
            <hr class="my-4">
            <livewire:profile.edit.contact-information />
            <hr class="my-4">
            <a class="boton-base verde-blanco" href="{{route('profile.show',$profile->user->username)}}">Regresar al perfil</a>
        </div>
    </div>
    @pushOnce('scripts')
        <script src="{{ asset('js/profile-edit.js') }}"></script>
    @endPushOnce
</x-html>
