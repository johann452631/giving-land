@extends('sections.signup.signup')
<!-- correo -->
@section('email')
    <h1 class="text-center text-2xl texto-verde pb-2">{{ $titulo }}</h1>
    <x-forms.input autofocus type="email" name="email" label-text="Correo electrónico:" class="mb-5">
        <br>
        <span class="texto-gris mt-2">Se enviará un código de verificación</span>
    </x-forms.input>
    <div class="flex flex-col">
        <button class="boton-base verde-blanco mb-4" type="submit">Enviar código</button>
        <a class="boton-base blanco-gris w-full flex justify-center items-center shadow-sm">
            <svg class="icono-md" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 48 48">
                <path fill="#fbc02d"
                    d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12	s5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24s8.955,20,20,20	s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z">
                </path>
                <path fill="#e53935"
                    d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039	l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z">
                </path>
                <path fill="#4caf50"
                    d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36	c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z">
                </path>
                <path fill="#1565c0"
                    d="M43.611,20.083L43.595,20L42,20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571	c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z">
                </path>
            </svg>
            <span class="text-base ml-2">Registrarse con Google</span>
        </a>
    </div>
@endsection

{{-- Código --}}
@section('code')
    <h2 class="text-center texto-verde text-2xl pb-2">{{ $titulo }}</h2>
    <div class="mb-3">
        <span class="texto-gris" for="email">Ingrese el código que se envió a:</span>
        <span class="bg-gris-claro border-0">{{ session('email') }}</span>
    </div>
    <x-forms.input-code class="mb-9"/>
    <button class="boton-base verde-blanco w-full" type="submit">Verificar</button>
@endsection

<!-- datos -->
@section('data')
    <h2 class="text-center texto-verde text-2xl pb-2">{{ $titulo }}</h2>
    <div class="mb-3">
        <span class="text-red-500">* </span>
        <span class="texto-gris">Indica que es obligatorio.</span>
    </div>
    <x-forms.input autofocus type="text" name="name" label-text="Nombres:" is-required class="mb-5">
    </x-forms.input>

    <x-forms.input type="text" name="surname" label-text="Apellidos:" class="mb-5">
    </x-forms.input>

    <x-forms.input type="date" name="birthday" label-text="Fecha de nacimiento:" class="mb-5">
    </x-forms.input>

    <x-forms.input type="text" name="email" label-text="Correo electrónico:" value="{{session('email')}}" readonly class="mb-5 input-read">
    </x-forms.input>

    <x-forms.input type="password" name="password" label-text="Contraseña:" value="" is-required class="mb-8">
    </x-forms.input>

    <button class="boton-base verde-blanco w-full" type="submit">Registrarse</button>
@endsection
