<div class="container overflow-x-auto">
    {{-- pop up para agregar red social nueva --}}
    <x-popup class="max-w-lg" id="crear_red_social">
        <form class="bg-gris-claro rounded-lg p-8" wire:submit="store">
            <h2 class="texto-verde text-3xl mb-6 text-center">Agregar red social</h2>
            <select class="bg-transparent outline-none w-full mb-4 text-xl" wire:model="redSocialId" id="select_nueva_red"
                data-select-social-media="#div_input_crear_red_social">
                <option class="text-base" value="-1" disabled selected>Selecciona una red social</option>
                @foreach ($socialMedia as $item)
                    <option class="text-base" value="{{ $item->id }}">{{ ucfirst($item->name) }}</option>
                @endforeach
            </select>
            <div class="div-form-input mb-8 hidden" id="div_input_crear_red_social">
                <label class="texto-verde text-lg" for="input_crear_red_social"></label>
                <input class="w-full pt-2 pl-1 mb-1" wire:model="inputUrl" type="text" id="input_crear_red_social"
                    required>
            </div>
            <div>
                <button type="submit" class="boton-base bg-red-500 mr-3 disabled:opacity-75" disabled>Agregar</button>
                <button type="reset" class="boton-base bg-gris text-white" wire:click="$refresh"
                    data-close-popup="#crear_red_social">Cancelar</button>
            </div>
        </form>
    </x-popup>

    {{-- Popup para editar el link de una red social --}}

    {{-- <x-popup class="max-w-lg" id="actualizar_red_social">
        <form class="bg-gris-claro rounded-lg p-8" wire:submit="update">
            <h2 class="texto-verde text-3xl mb-6 text-center">Editar red social</h2>
            <select class="bg-transparent outline-none w-full mb-4 text-xl" wire:model="redSocialId"
                id="select_nueva_red" data-select-social-media="#div_input_crear_red_social">
                <option class="text-base" value="-1" disabled selected>Selecciona una red social</option>
                @foreach ($socialMedia as $item)
                    <option class="text-base" value="{{ $item->id }}">{{ ucfirst($item->name) }}</option>
                @endforeach
            </select>
            <div class="div-form-input mb-8">
                <label class="texto-verde text-lg" for="input_actualizar_red_social"></label>
                <input class="input-edit-social-media w-full pt-2 pl-1 mb-1" type="text" wire:model="inputUrl"
                    id="input_actualizar_red_social" required>
            </div>
            <div>
                <button type="submit" class="boton-base bg-red-500 mr-3 disabled:opacity-75">Guardar</button>
                <button type="reset" class="boton-base bg-gris text-white" wire:click="$refresh"
                    data-close-popup="#actualizar_red_social">Cancelar</button>
            </div>
        </form>
    </x-popup> --}}

    @if ($popupEditDisplayed)
        <div class="popup fixed inset-0 bg-gray-800 bg-opacity-50 z-20 px-2" id="actualizar_red_social">
            <div class="mx-auto mt-32 max-w-lg">
                <form class="bg-gris-claro rounded-lg p-8" wire:submit="update">
                    <h2 class="texto-verde text-3xl mb-6 text-center">Editar red social</h2>
                    <select class="bg-transparent outline-none w-full mb-4 text-xl" wire:model="redSocialId"
                        id="select_nueva_red" data-select-social-media="#div_input_crear_red_social">
                        <option class="text-base" value="-1" disabled selected>Selecciona una red social</option>
                        @foreach ($socialMedia as $item)
                            <option class="text-base" value="{{ $item->id }}">{{ ucfirst($item->name) }}</option>
                        @endforeach
                    </select>
                    <div class="div-form-input mb-8">
                        <label class="texto-verde text-lg" for="input_actualizar_red_social"></label>
                        <input class="input-edit-social-media w-full pt-2 pl-1 mb-1" type="text"
                            wire:model="inputUrl" id="input_actualizar_red_social" required>
                    </div>
                    <div>
                        <button type="submit" class="boton-base bg-red-500 mr-3 disabled:opacity-75">Guardar</button>
                        <button type="reset" class="boton-base bg-gris text-white" wire:click="prueba"
                            onclick="">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
        <script></script>
    @endif

    <h1 class="text-lg texto-verde mb-4">Redes sociales:</h1>

    <!-- Botón para agregar usuario -->
    <buton class="bg-blue-600 boton-base text-white mb-4 rounded" data-show-popup="#crear_red_social">
        Agregar red social
    </buton>

    <!-- Tabla de usuarios -->
    <table class="min-w-full">
        <thead class="">
            <tr>
                <th class="py-2 pr-2 text-left">Red</th>
                <th class="py-2 pr-2 text-left">Link</th>
                <th class="py-2 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody class="">
            <!-- Aquí se llenarían dinámicamente los datos de la tabla con datos del servidor -->
            @foreach ($profile->socialMedia as $item)
                {{-- Por up para la edición de las redes sociales --}}

                <tr>
                    <td class="py-3">
                        <img class="size-6" src="{{ asset('socialmediaicons/' . $item->image->url) }}" alt="">
                    </td>
                    <td class="py-3 max-w-52 text-clip overflow-hidden">
                        {{ $item->pivot->url }}
                    </td>
                    <td class="py-3 text-center">
                        <i class="p-2 rounded cursor-pointer bg-yellow-300 mr-4 fa-solid fa-pen"
                            wire:click="edit({{ $item }})" data-show-popup="#actualizar_red_social"></i>
                        <i class="p-2 rounded cursor-pointer bg-red-500 fa-solid fa-trash"
                            data-show-popup="#delete_red_social_{{ $item->id }}"></i>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
{{-- @script
    <script>
        Livewire.on('edit-social-media', () => {
            document.getElementById('actualizar_red_social');
        });
    </script>
@endscript --}}
