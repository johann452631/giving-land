@extends('sections.signup.signup')
<!-- correo -->
@section('email')
    <div class="div-insercion-datos d-flex flex-column mb-4">
        <label for="email">Correo electrónico:</label>
        <input autofocus class="w-100" type="text" name="email" value={{ old('email') }}>
        @error('email')
            <span class="text-danger">* {{ $message }}</span>
        @enderror
        <span class="texto-gris mt-2">Se enviará un código de verificación</span>
    </div>
    <div class="d-flex flex-column">
        <button class="boton-base verde-blanco fs-5 pt-1 pb-1 w-100 mb-4 fw-bold" type="submit">Enviar código</button>
        <a class="boton-base blanco-gris pt-2 pb-2 w-100 d-flex justify-content-center align-items-center">
            <img class="img-icono-sm me-2" src="../icons/icono-google.png" alt="">
            <span class="fs-6">Registrarse con Google</span>
        </a>
    </div>
@endsection

<!-- código -->
@section('code')
    <div class="mb-3">
        <span class="texto-gris" for="email">Ingrese el código que se envió a:</span>
        <span class="bg-gris-claro border-0">{{ session('email') }}</span>
    </div>
    <div class="div-insercion-datos w-100 mb-5">
        <label class="" for="">Código de verificación:</label>
        <div class="div-codigo">
            <input autofocus type="text" maxlength="1" name="char1">
            <input type="text" maxlength="1" name="char2">
            <input type="text" maxlength="1" name="char3">
            <input type="text" maxlength="1" name="char4">
            <input type="text" maxlength="1" name="char5">
            <input type="text" maxlength="1" name="char6">
        </div>
    </div>
    @session('errorVerificacion')
        <span class="text-danger">* {{ session('errorVerificacion') }}</span>
    @endsession
    <button class="boton-base verde-blanco fs-5 pt-1 pb-1 w-100 fw-bold" type="submit">Verificar</button>
@endsection

<!-- datos -->
@section('data')
    <div class="mb-3">
        <span class="text-danger">* </span>
        <span class="texto-gris">Indica que es obligatorio.</span>
    </div>
    <div class="div-insercion-datos pb-4">
        <label for="">
            <span class="text-danger">*</span>
            <span>Nombres:</span>
        </label>
        <input autofocus class="w-100" type="text" name="name" value={{ old('name') }}>
        @error('name')
            <span class="text-danger">* {{ $message }}</span>
        @enderror
    </div>
    <div class="div-insercion-datos pb-4">
        <label for="">Apellidos:</label>
        <input class="w-100" type="text" name="surname" value={{ old('surname') }}>
        @error('surname')
            <span class="text-danger">* {{ $message }}</span>
        @enderror
    </div>
    <div class="div-insercion-datos pb-4">
        <label for="">Fecha de nacimiento:</label>
        <input class="w-100" type="date" name="birthday">
    </div>
    <div class="div-insercion-datos pb-4">
        <label for="">Correo electrónico:</label>
        <input class="w-100" type="text" name="email" value={{ session('email') }} readonly>
    </div>
    <div class="div-insercion-datos mb-5">
        <label for="">
            <span class="text-danger">*</span>
            <span>Contraseña:</span>
        </label>
        <input class="w-100" type="password" name="password">
        @error('password')
            <span class="text-danger">* {{ $message }}</span>
        @enderror
    </div>
    <button class="boton-base verde-blanco fs-5 pt-1 pb-1 w-100 fw-bold" type="submit">Registrarse</button>
@endsection
