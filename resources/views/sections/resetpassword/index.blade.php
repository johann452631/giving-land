<x-html>
    <x-html>
        <x-auth-header class="flex justify-between items-center">
            <a href="{{ route('login.index') }}">Volver al inicio de sesión</a>
        </x-auth-header>

        <div class="h-screen pt-16 grid place-items-center px-4">
            <x-form :ruta-siguiente="$rutaSiguiente" class="auth-form shadow shadow-gray-400">
                @include("sections.resetpassword.$content")
            </x-form>
        </div>
    </x-html>
</x-html>
