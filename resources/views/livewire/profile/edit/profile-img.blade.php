<div>
    {{-- Popup editar foto de perfil --}}
    <x-popup id="profileImgEdit">
        <x-form rutaSiguiente="profile.update" metodo="PUT" class="p-8 rounded min-w-80 flex flex-col items-center" enctype="multipart/form-data">
            <img class="size-32 redondo mb-6 mx-auto"
                @if ($profile->user->google_id == null) src="{{ asset('/storage/users_profile_images/' . $profile->image->url) }}"
                @else
                src="{{ $profile->image->url }}" alt="" @endif
                id="imagenSeleccionada">
    
            <label class="boton-base bg-yellow-200" for="inputImg">Seleccionar imagen</label>
            <input type="file" accept="image/*" id="inputImg" name="profile_img" hidden>
            <div class="flex mt-4 justify-around w-full">
                <button class="boton-base verde-blanco disabled:opacity-75" type="submit" disabled>Guardar</button>
                <div class="boton-base bg-gray-500 text-white" wire:click="$refresh" data-close-popup="#profileImgEdit">Cancelar</div>
            </div>
        </x-form>
    </x-popup>

    {{-- Popup eliminar foto de perfil --}}
    <x-popup id="profileImgDelete">
        <form class="bg-gris-claro rounded-lg p-8" wire:submit="deletePhoto">
            <p class="mb-3">¿Deseas eliminar tu foto de perfil?</p>
            <button type="submit" class="boton-base bg-red-500 mr-3">Eliminar</button>
            <button type="button" class="boton-base bg-gris text-white" data-close-popup="#profileImgDelete">Cancelar</button>
        </form>
    </x-popup>

    <div>
        <p class="texto-verde mb-2">Imagen de perfil:</p>
        <div class="flex w-full items-center">
            <img class="size-12 redondo mr-4"
                @if ($profile->user->google_id == null) src="{{ asset('/storage/users_profile_images/' . $profile->image->url) }}"
                @else
                src="{{ $profile->image->url }}" alt="" @endif>
            <div>
                <i class="p-2 rounded cursor-pointer bg-yellow-300 mr-4 fa-solid fa-pen" data-show-popup="#profileImgEdit"></i>
                @if ($profile->image->url != 'default.svg')
                <i class="p-2 rounded cursor-pointer bg-red-500 fa-solid fa-trash" data-show-popup="#profileImgDelete"></i>
                @endif
            </div>
        </div>
    </div>
</div>
