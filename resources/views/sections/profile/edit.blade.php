<x-html>
    @pushOnce('links')
        <link rel="stylesheet" href="{{ asset('css/profile-edit.css') }}">
    @endPushOnce
    
    <x-navigation-header />
    <div class="contenido-main">
        <div class="bg-gris-claro rounded p-10 max-w-xl my-0 mx-auto">
            <livewire:profile.edit.profile-img :$profile/>
            <hr class="my-4">
            <livewire:profile.edit.social-media :$profile/>
            <hr class="my-4">
            <a class="boton-base verde-blanco" href="{{route('profile.show',$profile->user->username)}}">Regresar al perfil</a>
        </div>
    </div>
    @pushOnce('scripts')
        <script src="{{ asset('js/profile-edit.js') }}"></script>
    @endPushOnce
</x-html>
