<x-html>
    <x-html>
        <x-header class="p-3 flex justify-between items-center">
            <a href="{{ route('login.index') }}">Volver al inicio de sesión</a>
        </x-header>

        <div class="px-4 pt-10">
            <x-form :ruta-siguiente="$rutaSiguiente" class="auth-form shadow shadow-gray-400">
                @include("sections.resetpassword.$content")
            </x-form>
        </div>
    </x-html>
</x-html>
