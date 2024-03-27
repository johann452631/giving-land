@extends('sections.signup.signup')
<!-- correo -->
@section('email')
    <div class="div-insercion-datos d-flex flex-column mb-4">
        <label for="email">Correo electrónico:</label>
        <input class="w-100" type="text" name="email" value={{old('email')}}>
        @error('email')
            <span class="text-danger">* {{$message}}</span>
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
        <label class="texto-gris" for="email">Ingrese el código que se envió a:</label>
        <input class="bg-gris-claro border-0" type="text" readonly value={{ $email }} name="email" id="inputEmailMuestra">
    </div>
    <div class="div-insercion-datos d-flex flex-column mb-4">
        <label class="" for="">Código de verificación:</label>
        <div class="div-codigo d-flex justify-content-between">
            <input type="text" maxlength="1">
            <input type="text" maxlength="1">
            <input type="text" maxlength="1">
            <input type="text" maxlength="1">
            <input type="text" maxlength="1">
            <input type="text" maxlength="1">
        </div>
    </div>
    <button class="boton-base verde-blanco fs-5 pt-1 pb-1 w-100 mb-4 fw-bold" type="submit">Verificar</button>
@endsection

<!-- datos -->
@section('data')
    <div class="d-flex flex-column mb-4">
        <div class="div-insercion-datos pb-4">
            <label for="">Nombres:</label>
            <input class="w-100" type="text" name="name">
        </div>
        <div class="div-insercion-datos pb-4">
            <label for="">Apellidos:</label>
            <input class="w-100" type="text" name="apellidos">
        </div>
        <div class="div-insercion-datos pb-4">
            <label for="">Fecha de nacimiento:</label>
            <input class="w-100" type="date" name="fecha-nacimiento">
        </div>
        <div class="div-insercion-datos pb-4">
            <label for="">Correo electrónico:</label>
            <input class="w-100" type="text" name="email" value={{ $email }} readonly>
        </div>
        <div class="div-insercion-datos">
            <label for="">Contraseña:</label>
            <input class="w-100" type="password" name="password">
        </div>
    </div>
    <button class="boton-base verde-blanco fs-5 pt-1 pb-1 w-100 mb-4 fw-bold" type="submit">Registrarse</button>
@endsection
