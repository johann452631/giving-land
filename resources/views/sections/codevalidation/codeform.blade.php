@extends($extends)
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