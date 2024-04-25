@extends('sections.users.index')

@section('edit')
    @pushOnce('links')
        <link rel="stylesheet" href="{{ asset('css/user-edit.css') }}">
    @endPushOnce
    <x-popup>
        <x-form-parameter ruta-siguiente="users.deletePhoto" :parametro="$user->id" metodo='PUT' class="rounded-lg p-8">
            <p class="mb-3">¿Deseas eliminar tu foto de perfil?</p>
            <button type="submit" class="boton-base bg-red-500 mr-3">Eliminar</button>
            <button type="button" class="cerrar-popup boton-base bg-gris text-white">Cancelar</button>
        </x-form-parameter>
    </x-popup>
    <div>
        <x-form-parameter ruta-siguiente="users.update" :parametro="$user->id" metodo="PUT" class="py-10 px-20 rounded-lg"
            enctype="multipart/form-data">
            <x-forms.input autofocus type="text" name="username" label-text="Nombre de usuario:" class="mb-10"
                value="{{ $user->username }}">
            </x-forms.input>
            <div class="mb-10">
                <label for="url_profile_img">
                    <p class="texto-verde mb-2">Imagen de perfil:</p>
                    <div class="flex items-center">
                        @if ($user->url_profile_img == null)
                            <img class="profile-edit-img bg-white" src="{{ asset('appicons\user-solid.svg') }}"
                                alt="" id="imagenSeleccionada">
                        @else
                            <img src="{{ asset('storage/users_profile_images/' . $user->url_profile_img) }}" alt=""
                                class="profile-edit-img mr-3" id="imagenSeleccionada">
                            <div class="boton-base bg-red-500" id="eliminarFoto"><i class="fa-solid fa-trash"></i></div>
                        @endif
                    </div>
                </label>
                <input type="file" accept="image/*" id="inputImg" name="url_profile_img" class="mt-4">
            </div>
            <x-forms.input type="text" name="name" label-text="Nombre:" class="mb-10" value="{{ $user->name }}">
            </x-forms.input>

            <div class="mb-10">
                <p class="texto-verde">Correo electrónico:</p>
                <div class="flex flex-wrap items-center">
                    <p class="flex text-gray-800 mr-5">{{ $user->email }}</p>
                    <a href="{{ route('changeEmail.index', $user->username) }}" class="boton-base bg-edit"><i
                            class="fa-solid fa-pen"></i></a>
                </div>
            </div>

            <div>
                <button type="submit" class="boton-base verde-blanco mr-3">Guardar</button>
                <a href="{{ route('users.show', $user->username) }}"
                    class="d-inline-block boton-base gris-blanco">Cancelar</a>
            </div>
        </x-form-parameter>
    </div>
    <script src="{{ asset('js/user-edit.js') }}"></script>
@endsection

@section('edit-email')
    <div>
        <x-form ruta-siguiente="changeEmail.sendCode" class="py-10 px-20 rounded-lg">
            <h2 class="text-2xl texto-verde text-center mb-5">Edición de correo electrónico</h2>
            <x-forms.input autofocus type="text" name="email" label-text="Correo electrónico nuevo:" class="mb-10">
                <p class="texto-gris mt-3">Se enviará un código de verificación</p>
            </x-forms.input>
            <div>
                <button type="submit" class="boton-base verde-blanco mr-3">Enviar código</button>
                <a href="{{ route('users.edit', $user->username) }}"
                    class="d-inline-block boton-base gris-blanco">Cancelar</a>
            </div>
        </x-form>
    </div>
@endsection

@section('code-form')
    <div>
        <x-form ruta-siguiente="codeValidation.verifyCode" class="py-10 px-32 rounded-lg">
            <h2 class="text-2xl texto-verde text-center mb-5">Verificación de código</h2>
            <p class="mb-5">Si el código concide, el correo electrónico se actualizará a <b>{{ session('email') }}</b>
            </p>
            <x-forms.input-code />
            <div class="mt-10">
                <button type="submit" class="boton-base verde-blanco mr-3">Enviar código</button>
                <a href="{{ route('users.edit', $user->username) }}"
                    class="d-inline-block boton-base gris-blanco">Cancelar</a>
            </div>
        </x-form>
    </div>
    <script src="{{ asset('js/codevalidation/code.js') }}"></script>
@endsection
