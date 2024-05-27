<x-html>
    {{-- Header --}}
    <x-header />

    {{-- Main --}}
    <div class="contenido-main">
        <div class="bg-gris-claro rounded p-10 max-w-xl my-0 mx-auto">
            <livewire:profile.edit.profile-img />
            <hr>
            <livewire:profile.edit.social-media />
            <hr>
            <livewire:profile.edit.contact-information />
            <hr class="mb-4">
            <a class="boton-base verde-blanco" href="{{route('profile.show',$username)}}">Regresar al perfil</a>
        </div>
    </div>
</x-html>
