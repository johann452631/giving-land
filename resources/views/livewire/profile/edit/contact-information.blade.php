<div class="py-4 overflow-x-auto">
    {{-- editar una red social --}}
    <x-popup-livewire max-width="md" id="crear_red_social" wire:model='editDisplayed'>
        <form class="bg-gris-claro rounded-lg p-8" wire:submit='update()'>
            <h2 class="texto-verde text-3xl mb-6 text-center">
                Agregar información de contacto
            </h2>
            <div class="div-form-input mb-8">
                <label class="texto-verde text-lg">
                    Nombre de la información
                    <input class="w-full text-gray-900" type="text" wire:model="inputName" maxlength="20">
                </label>
            </div>
            <div class="div-form-input mb-8">
                <div class="flex justify-between">
                    <label class="texto-verde text-lg" for="information">Información</label>
                    <label class="text-lg" title="Se podrá navegar con un click">
                        <i class="fa-solid fa-circle-question fa-xs"></i>
                        Es enlace
                        <input class="text-gray-900" type="checkbox" wire:model='isLink'>
                    </label>
                </div>
                <input class="w-full" maxlength="255" wire:model="inputInfo" type="text" id="information">
                @error('inputInfo')
                    <p class="text-red-400">* {{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type="submit" class="boton-base bg-red-500 mr-3 disabled:opacity-75"
                    @disabled($submitDisabled)>
                    Guardar
                </button>
                <button type="button" class="boton-base bg-gris text-white" x-on:click="show = false">Cancelar</button>
            </div>
        </form>
    </x-popup-livewire>

    <h1 class="text-2xl texto-verde mb-4">Información de contacto:</h1>

    <!-- Tabla de información de contacto -->
    @if (count($profile->contactInformation))
        <table class="min-w-full">
            <thead class="">
                <tr>
                    <th class="py-2 pr-2 text-left">Nombre</th>
                    <th class="py-2 pr-2 text-left">Información</th>
                    <th class="py-2 pr-2 text-left">Enlace</th>
                    <th class="py-2 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="">
                <!-- Aquí se llenarían dinámicamente los datos de la tabla con datos del servidor -->
                @foreach ($profile->contactInformation as $profileItem)
                    <tr>
                        <td class="py-3">{{$profileItem->name}}</td>
                        <td class="py-3 max-w-52 truncate">{{ $profileItem->info }}</td>
                        <td class="py-3 text-center">
                            @if ($profileItem->is_link)
                                Sí
                            @else
                                No
                            @endif
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

    {{-- botón para agregar info --}}
    <buton @class([
        'bg-blue-700 boton-base text-white mb-4 rounded',
        'hidden' => $createDisplayed,
    ]) wire:click='create'>
        Agregar
    </buton>

    @if ($createDisplayed)
        <form class="bg-gris-claro rounded-lg" wire:submit='store()'>
            <div class="div-form-input mb-8">
                <label class="texto-verde text-lg">
                    Nombre de la información
                    <input class="w-full text-gray-900" type="text" wire:model="inputName" maxlength="20"
                        placeholder="Correo electrónico, teléfono, dirección, etc">
                </label>
            </div>
            <div class="div-form-input mb-8">
                <div class="flex justify-between">
                    <label class="texto-verde text-lg" for="information">Información</label>
                    <label class="text-lg" title="Se podrá navegar con un click">
                        <i class="fa-solid fa-circle-question fa-xs"></i>
                        Es enlace
                        <input class="text-gray-900" type="checkbox" wire:model='isLink'>
                    </label>
                </div>
                <input class="w-full" maxlength="255" wire:model="inputInfo" type="text" id="information">
                @error('inputInfo')
                    <p class="text-red-400">* {{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type="submit" class="boton-base verde-blanco mr-3 disabled:opacity-75"
                    @disabled($submitDisabled)>
                    Agregar
                </button>
                <button type="button" class="boton-base gris-blanco" wire:click='cancelCreate'>Cancelar</button>
            </div>
        </form>
    @endif

    

</div>
