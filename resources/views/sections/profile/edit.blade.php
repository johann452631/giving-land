<x-html>
    @pushOnce('links')
        <link rel="stylesheet" href="{{ asset('css/profile-edit.css') }}">
    @endPushOnce
    <x-navigation-header />
    {{-- <x-popup>
        <x-form ruta-siguiente="profile.deletePhoto" metodo="PUT" class="rounded-lg p-8">
            <p class="mb-3">¿Deseas eliminar tu foto de perfil?</p>
            <p class="mb-3">SE ELIMINARÁ DIRECTAMENTE DESDE AQUÍ</p>
            <button type="submit" class="boton-base bg-red-500 mr-3">Eliminar</button>
            <button type="button" class="cerrar-popup boton-base bg-gris text-white">Cancelar</button>
        </x-form>
    </x-popup> --}}
    <div class="contenido-main">
        <div class="bg-gris-claro rounded p-10 max-w-lg my-0 mx-auto">
            <livewire:profile.edit.profile-img :$profile/>
            <hr class="my-4">
            <a class="boton-base verde-blanco" href="{{route('profile.show')}}">Regresar al perfil</a>
        </div>
    </div>
    @pushOnce('scripts')
        <script src="{{ asset('js/profile-edit.js') }}"></script>
    @endPushOnce
</x-html>
