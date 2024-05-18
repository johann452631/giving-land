<x-html titulo-pagina="Giving Land - Signup">
    <x-auth-header class="flex justify-between items-center" >
        <a class="boton-base verde-blanco" href="{{route('login.index')}}">Inicio de sesión</a>
    </x-auth-header>

    <div class="h-screen pt-16 grid place-items-center px-4">
        <x-form :ruta-siguiente="$rutaSiguiente" class="auth-form shadow shadow-gray-400">
            @include("sections.signup.$content")
        </x-form>
    </div>
</x-html>
