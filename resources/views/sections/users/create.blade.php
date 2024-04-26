<x-html>
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
    </x-slot>
    <x-header class="p-3" />
    <div class="px-4 pt-10">
        <x-form-parameter :ruta-siguiente="$rutaSiguiente" class="signup-form">
            <h2 class="text-center texto-verde text-3xl pb-2">Registro de datos</h2>
            <div class="mb-3">
                <span class="text-red-500">* </span>
                <span class="texto-gris">Indica que es obligatorio.</span>
            </div>
            <x-forms.input autofocus type="text" name="name" label-text="Nombre:" is-required class="mb-5">
            </x-forms.input>

            <x-forms.input type="text" name="email" label-text="Correo electrónico:" value="{{ $request->email }}"
                readonly class="mb-5 input-read">
            </x-forms.input>

            <x-forms.input type="password" name="password" label-text="Contraseña:" value="" is-required
                class="mb-8">
            </x-forms.input>

            <button class="boton-base verde-blanco w-full" type="submit">Registrarse</button>
        </x-form-parameter>
    </div>
</x-html>