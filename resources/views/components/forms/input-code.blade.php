<div {{ $attributes->merge(['class' => 'div-form-input w-full']) }}>
    <label class="texto-verde" for="">Código de verificación:</label>
    <div class="div-codigo mb-1 grid grid-cols-6 gap-x-3">
        <input autofocus type="text" maxlength="1" name="char1">
        <input type="text" maxlength="1" name="char2">
        <input type="text" maxlength="1" name="char3">
        <input type="text" maxlength="1" name="char4">
        <input type="text" maxlength="1" name="char5">
        <input type="text" maxlength="1" name="char6">
    </div>
</div>
@session('errorVerificacion')
    <span class="text-red-500">* {{ session('errorVerificacion') }}</span>
@endsession