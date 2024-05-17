<div>
    {{-- Popup editar foto de perfil --}}
    <x-popup-livewire max-width="sm" id="profile_img_edit" wire:model='editDisplayed'>
        <x-form rutaSiguiente="profile.update" metodo="PUT" class="rounded py-8 px-2 flex flex-col items-center"
            enctype="multipart/form-data">
            <img class="size-40 redondo mb-6 mx-auto"
                @if ($profile->user->google_id == null) src="{{ asset('/storage/users_profile_images/' . $profile->image->url) }}"
                @else
                src="{{ $profile->image->url }}" alt="" @endif
                id="imagenSeleccionada">
            <div>
                <input type="file" accept="image/*" id="inputImg" name="profile_img" hidden>
                <label class="boton-base bg-yellow-200" for="inputImg">Seleccionar imagen</label>
            </div>

            <div class="mt-4 min-w-16 flex flex-between">
                <button class="boton-base verde-blanco disabled:opacity-75 mr-6" type="submit"
                    disabled>Guardar</button>
                <button class="boton-base bg-gray-500 text-white" type="reset"
                x-on:click="show = false">Cancelar</button>
            </div>
        </x-form>
    </x-popup-livewire>

    {{-- Popup eliminar foto de perfil --}}
    <x-popup-livewire max-width="sm" id="profile_img_delete" wire:model='deleteDisplayed'>
        <form class="bg-gris-claro rounded-lg p-8" wire:submit="deletePhoto">
            <p class="mb-3 text-lg">¿Estás segura/o de eliminar tu foto de perfil?</p>
            <button type="submit" class="boton-base bg-red-500 mr-3">Eliminar</button>
            <button type="button" class="boton-base bg-gris text-white"
            x-on:click="show = false">Cancelar</button>
        </form>
    </x-popup-livewire>

    <div>
        <p class="texto-verde mb-2 text-lg">Imagen de perfil:</p>
        <div class="flex w-full items-center">
            <img class="size-12 redondo mr-4"
                @if ($profile->user->google_id == null) src="{{ asset('/storage/users_profile_images/' . $profile->image->url) }}"
                @else
                src="{{ $profile->image->url }}" alt="" @endif>
            <div>
                <i class="p-2 rounded cursor-pointer bg-yellow-300 mr-4 fa-solid fa-pen"
                    wire:click='edit'></i>
                @if ($profile->image->url != 'default.svg')
                    <i class="p-2 rounded cursor-pointer bg-red-500 fa-solid fa-trash"
                    wire:click='dialogDeletePhoto'></i>
                @endif
            </div>
        </div>
    </div>
</div>
