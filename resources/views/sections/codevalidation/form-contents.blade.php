@extends('sections.codevalidation.index')

<!-- código -->
@section('code')
    <h2 class="text-center texto-verde text-2xl pb-2">{{ $titulo }}</h2>
    <div class="mb-3">
        <span class="texto-gris" for="email">Ingrese el código que se envió a:</span>
        <span class="bg-gris-claro border-0">{{ session('email') }}</span>
    </div>
    <x-forms.input-code class="mb-8"/>
    
    <button class="w-full boton-base verde-blanco mb-4" type="submit">Verificar</button>
@endsection
