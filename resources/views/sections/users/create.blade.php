<x-html>
    <x-header class="p-3" />

    <div class="px-4 pt-10">
        <x-form :ruta-siguiente="$rutaSiguiente" class="auth-form shadow shadow-gray-400">
            <h2 class="text-center texto-verde text-3xl mb-6">Registro de datos</h2>
            <p class="text-gray-800 mb-5">
                <font class="text-red-600">*</font> Indica que es obligatorio.
            </p>
            <x-forms.input autofocus type="text" name="name" label-text="Nombre:" is-required class="mb-10" />

            <x-forms.input type="text" name="email" label-text="Correo electrónico:" value="{{ $email }}"
                readonly class="mb-10 input-read" />

            <x-forms.input type="password" name="password" label-text="Contraseña:" value="" is-required
            class="mb-10"/>

            <input type="hidden" name="email_verified_at" value="{{ $email_verified_at }}">

            <button class="boton-base verde-blanco w-full" type="submit">Registrarse</button>
        </x-form>
    </div>
</x-html>
