@extends('sections.resetpassword.index')

@section('email-request')
    <h1 class="text-center text-2xl texto-verde pb-2">{{ $titulo }}</h1>

    <x-forms.input autofocus type="email" name="email" label-text="Correo electrónico:" class="mb-5">
        <br>
        <span class="texto-gris mt-2">Se enviará un código de verificación</span>
    </x-forms.input>

    <button class="w-full boton-base verde-blanco mb-4" type="submit">Enviar código</button>
@endsection

@section('new-password')
    <h2 class="text-center texto-verde text-2xl pb-2">{{ $titulo }}</h2>

    @isset($request)
        <x-forms.input type="email" name="email" label-text="Correo electrónico:" class="mb-5" value="{{ $request->email }}" readonly>
        </x-forms.input>

        <input name="token" type="hidden" value={{ $request->route('token') }} />
    @endisset

    <x-forms.input type="password" name="password" label-text="Nueva contraseña:" class="mb-8" value="" autofocus>
    </x-forms.input>

    <x-forms.input type="password" name="password_confirmation" label-text="Confirmación de contraseña:" class="mb-8"
        value="">
    </x-forms.input>

    <button class="w-full boton-base verde-blanco mb-4" type="submit">Guardar</button>
@endsection
