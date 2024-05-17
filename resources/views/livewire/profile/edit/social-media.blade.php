<div class="container overflow-x-auto">
    {{-- pop up para agregar editar una red social --}}
    <x-popup-livewire class="max-w-lg" id="crear_red_social" wire:model='editOrCreateDisplayed'>
        <form class="bg-gris-claro rounded-lg p-8" wire:submit='updateOrStore'>
            <h2 class="texto-verde text-3xl mb-6 text-center">
                @if ($item !== null)
                    Editar
                @else
                    Agregar
                @endif
                red social
            </h2>
            <select class="bg-transparent outline-none w-full mb-4 text-xl" wire:model="id" wire:change='onChangeSelect'>
                <option class="text-base" value="0" disabled>Selecciona una red social</option>
                @foreach ($socialMedia as $element)
                    <option class="text-base" value="{{ $element->id }}">{{ ucfirst($element->name) }}</option>
                @endforeach
            </select>
            <div @class(['div-form-input mb-8', 'hidden' => !$divInputDisplayed])>
                <label class="texto-verde text-lg" for="input">
                    @if ($id==4)
                        Número:
                    @else
                        Link de perfil:
                    @endif
                </label>
                <input class="w-full pt-2 pl-1 mb-1"
                    @if ($id==4) wire:model="number" inputmode="numeric" @else wire:model="url" @endif
                    type="text" id="input">
                @error('url')
                    <p class="text-red-400">* {{ $message }}</p>
                @enderror
                @error('number')
                    <p class="text-red-400">* {{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type="submit" class="boton-base bg-red-500 mr-3 disabled:opacity-75" id="enviar_editar_crear"
                    @if ($id == -1) disabled @endif>
                    @if ($item !== null)
                        Guardar
                    @else
                        Agregar
                    @endif
                </button>
                <button type="button" class="boton-base bg-gris text-white" x-on:click="show = false">Cancelar</button>
            </div>
        </form>
    </x-popup-livewire>
    <x-popup-livewire max-width="sm" id="profile_img_delete" wire:model='deleteDisplayed'>
        @isset($item)
            <div class="bg-gris-claro rounded-lg p-8">
                <div class="flex flex-wrap mb-3 text-lg">
                    ¿Estás segura/o de eliminar
                    {{ ' ' . $item['name'] }}
                    <img class="size-6" src="{{ asset('socialmediaicons/' . $item['image']['url']) }}" alt="">
                    ?

                </div>
                <button type="button" class="boton-base bg-red-500 mr-3"
                    wire:click='destroy({{ $item['id'] }})'>Eliminar</button>
                <button type="button" class="boton-base bg-gris text-white" x-on:click="show = false">Cancelar</button>
            </div>
        @endisset
    </x-popup-livewire>

    <h1 class="text-lg texto-verde mb-4">Redes sociales:</h1>

    <!-- Botón para agregar usuario -->
    <buton class="bg-blue-600 boton-base text-white mb-4 rounded" wire:click='editOrCreate'>
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
            @foreach ($profile->socialMedia as $element)
                {{-- Por up para la edición de las redes sociales --}}

                <tr>
                    <td class="py-3">
                        <img class="size-6" src="{{ asset('socialmediaicons/' . $element->image->url) }}"
                            alt="">
                    </td>
                    <td class="py-3 max-w-52 text-clip overflow-hidden">
                        {{ $element->pivot->url }}
                    </td>
                    <td class="py-3 text-center">
                        <i class="p-2 rounded cursor-pointer bg-yellow-300 mr-4 fa-solid fa-pen"
                            wire:click="editOrCreate({{ $element }})"></i>
                        <i class="p-2 rounded cursor-pointer bg-red-500 fa-solid fa-trash"
                            wire:click='dialogDestroy({{ $element }})'></i>
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
