<h2 class="text-center texto-verde text-3xl pb-2">Verificación de código</h2>
<label>
    Ingrese el código que se le envió a:
    <input class="bg-transparent" name="email" value="{{ $request->email }}" readonly>
</label>
<x-forms.input-code class="mb-8"/>

<input name="hashed" type="hidden" value={{ $request->hashed }} />

<button class="w-full boton-base verde-blanco mb-4" type="submit">Verificar</button>