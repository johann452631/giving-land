<div class="container overflow-x-auto">
    {{-- Crear una red social --}}
    <x-popup-livewire max-width="xl" id="crear_red_social" wire:model='createDisplayed'>
        <form class="bg-gris-claro rounded-lg p-8" wire:submit='store()'>
            <h2 class="texto-verde text-3xl mb-6 text-center">
                Agregar información de contacto
            </h2>
            <p>Email, número de teléfono, página web, etc. (En caso de enlaces, puedes marcar la casilla "Es enlace" para que se pueda navegar con un click.)</p>
            <div>
                <label>
                    <input type="checkbox" wire:model="isLink" value="1">
                    Es enlace
                </label>
            </div>
            <div class="div-form-input mb-8">
                <label>
                    <input class="w-full" maxlength="255" wire:model="inputInfo" type="text">
                    @error('inputInfo')
                        <p class="text-red-400">* {{ $message }}</p>
                    @enderror
                </label>
            </div>
            <div>
                <button type="submit" class="boton-base bg-red-500 mr-3 disabled:opacity-75"
                    @disabled($submitDisabled)>
                    Agregar
                </button>
                <button type="button" class="boton-base bg-gris text-white" x-on:click="show = false">Cancelar</button>
            </div>
        </form>
    </x-popup-livewire>

    {{-- Editar red social --}}
    {{-- @isset($item)
        <x-popup-livewire id="crear_red_social" wire:model='editDisplayed'>
            <form class="bg-gris-claro rounded-lg p-8" wire:submit='update({{ $item }})'>
                <h2 class="texto-verde text-3xl mb-6 text-center">
                    Editar red social
                </h2>
                <div class="flex items-center">
                    <img class="size-6 mr-3" src="{{ asset('socialmediaicons/' . $item->image->url) }}" alt="">
                    <p class="text-lg">{{ $item->name }}</p>
                </div>
                <div class="div-form-input mb-8">
                    <label class="texto-verde text-lg" for="input">
                        @if ($inputIsNumber)
                            Número:
                        @else
                            Link de perfil:
                        @endif
                    </label>
                    @if ($inputIsNumber)
                        <input class="w-full" class="w-full" wire:input='onEditInputChanged' wire:model="inputNumber"
                            inputmode="numeric" maxlength="10" type="text" id="input">
                        @error('inputNumber')
                            <p class="text-red-400">* {{ $message }}</p>
                        @enderror
                    @else
                        <input class="w-full" maxlength="255" wire:input='onEditInputChanged' wire:model="inputUrl"
                            type="text" id="input">
                        @error('inputUrl')
                            <p class="text-red-400">* {{ $message }}</p>
                        @enderror
                    @endif
                </div>
                <div>
                    <button type="submit" class="boton-base bg-red-500 mr-3 disabled:opacity-75"
                        @disabled($submitDisabled)>Guardar</button>
                    <button type="button" class="boton-base bg-gris text-white" x-on:click="show = false">Cancelar</button>
                </div>
            </form>
        </x-popup-livewire>
    @endisset --}}

    {{-- Diálogo de eliminar --}}
    {{-- @isset($item)
        <x-popup-livewire max-width="sm" id="profile_img_delete" wire:model='deleteDisplayed'>
            <form class="bg-gris-claro rounded-lg p-8" wire:submit='destroy({{ $item }})'>
                <div class="flex flex-wrap mb-3 text-lg">
                    ¿Estás segura/o de eliminar
                    {{ ' ' . $item->name }}
                    <img class="size-6" src="{{ asset('socialmediaicons/' . $item->image->url) }}" alt="">
                    ?

                </div>
                <button type="submit" class="boton-base bg-red-500 mr-3">Eliminar</button>
                <button type="button" class="boton-base bg-gris text-white" x-on:click="show = false">Cancelar</button>
            </form>
        </x-popup-livewire>
    @endisset --}}

    <h1 class="text-lg texto-verde mb-4">Información de contacto:</h1>


    <!-- Botón para agregar info -->
    <buton class="bg-blue-600 boton-base text-white mb-4 rounded" wire:click='create'>
        Agregar red social
    </buton>


    <!-- Tabla de usuarios -->
    @if (count($profile->contactIformation))
        <table class="min-w-full">
            <thead class="">
                <tr>
                    <th class="py-2 pr-2 text-left">Info</th>
                    <th class="py-2 pr-2 text-left">Link</th>
                    <th class="py-2 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="">
                <!-- Aquí se llenarían dinámicamente los datos de la tabla con datos del servidor -->
                @foreach ($profile->contactInformation as $profileItem)
                    {{-- Por up para la edición de las redes sociales --}}

                    <tr>
                        <td class="py-3">
                            <img class="size-6" src="{{ asset('socialmediaicons/' . $profileItem->image->url) }}"
                                alt="">
                        </td>
                        <td class="py-3 max-w-52 text-clip overflow-hidden">
                            {{ $profileItem->pivot->url }}
                        </td>
                        <td class="py-3 text-center">
                            <i class="p-2 rounded cursor-pointer bg-yellow-300 mr-4 fa-solid fa-pen"
                                wire:click="edit({{ $profileItem }})"></i>
                            <i class="p-2 rounded cursor-pointer bg-red-500 fa-solid fa-trash"
                                wire:click='dialogDestroy({{ $profileItem }})'></i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="mt-4">No tienes redes sociales agregadas aún</p>
    @endif

</div>

