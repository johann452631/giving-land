@extends('sections.signup.index')

@section('create')
    <h2 class="text-center texto-verde text-2xl pb-2">{{ $titulo }}</h2>
    <div class="mb-3">
        <span class="text-red-500">* </span>
        <span class="texto-gris">Indica que es obligatorio.</span>
    </div>
    <x-forms.input autofocus type="text" name="name" label-text="Nombre:" is-required class="mb-5">
    </x-forms.input>

    <x-forms.input type="text" name="email" label-text="Correo electrónico:" value="{{ session('email') }}" readonly
        class="mb-5 input-read">
    </x-forms.input>

    <x-forms.input type="password" name="password" label-text="Contraseña:" value="" is-required class="mb-8">
    </x-forms.input>

    <button class="boton-base verde-blanco w-full" type="submit">Registrarse</button>
@endsection
