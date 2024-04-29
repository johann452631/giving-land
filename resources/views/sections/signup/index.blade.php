<x-html>
    <x-header class="p-3 flex justify-between items-center" >
        <a class="boton-base verde-blanco" href="{{route('login.index')}}">Inicio de sesión</a>
    </x-header>

    <div class="px-4 pt-10">
        <x-form :ruta-siguiente="$rutaSiguiente" class="auth-form shadow shadow-gray-400">
            @include("sections.signup.$content")
        </x-form>
    </div>
</x-html>
