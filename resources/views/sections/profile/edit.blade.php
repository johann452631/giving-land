<x-html>
    @pushOnce('links')
        <link rel="stylesheet" href="{{ asset('css/profile-edit.css') }}">
    @endPushOnce
    <x-navigation-header />
    <x-popup>
        <x-form ruta-siguiente="profile.deletePhoto" metodo="PUT" class="rounded-lg p-8">
            <p class="mb-3">¿Deseas eliminar tu foto de perfil?</p>
            <p class="mb-3">SE ELIMINARÁ DIRECTAMENTE DESDE AQUÍ</p>
            <button type="submit" class="boton-base bg-red-500 mr-3">Eliminar</button>
            <button type="button" class="cerrar-popup boton-base bg-gris text-white">Cancelar</button>
        </x-form>
    </x-popup>
    <div class="grid place-items-center contenido-main">
        <x-form ruta-siguiente="profile.update" metodo="PUT" class="py-10 px-20 rounded-lg"
            enctype="multipart/form-data">
            <div class="mb-10">
                <p class="texto-verde mb-2">Imagen de perfil:</p>
                <div class="flex items-center">
                    <img class="profile-edit-img"
                        @if ($profile->user->google_id == null) src="{{ asset('/storage/users_profile_images/' . $profile->image->url) }}"
                        @else
                        src="{{ $profile->image->url }}" alt="" @endif
                        id="imagenSeleccionada">

                    @if ($profile->image->url != 'default.svg')
                        <div class="boton-base bg-red-500" id="eliminarFoto"><i class="fa-solid fa-trash"></i></div>
                    @endif
                </div>
                <label>
                    <input type="file" accept="image/*" id="inputImg" name="profile_img" class="mt-4">
                </label>
            </div>

            <div>
                <button type="submit" class="boton-base verde-blanco mr-3">Guardar</button>
                <a href="{{ route('profile.show') }}" class="d-inline-block boton-base gris-blanco">Cancelar</a>
            </div>
        </x-form>
    </div>
    @pushOnce('scripts')
        <script src="{{ asset('js/profile-edit.js') }}"></script>
    @endPushOnce
</x-html>
