<h1 class="text-center text-3xl texto-verde pb-2">Registro</h1>
<x-forms.input autofocus type="email" name="email" label-text="Correo electrónico:" class="mb-5">
    <br>
    <span class="texto-gris mt-2">Se enviará un código de verificación</span>
</x-forms.input>
<input type="hidden" name="token" value="{{$token}}">
<div class="flex flex-col">
    <button class="boton-base verde-blanco mb-4" type="submit">Enviar código</button>
    <a href="/google-auth/redirect" class="boton-base blanco-gris w-full flex justify-center items-center shadow-sm">
        <img class="size-7" src="{{ asset('appicons/icon-google.svg') }}" alt="">
        <p class="text-base ml-2">Registrarse con Google</p>
    </a>
</div>
