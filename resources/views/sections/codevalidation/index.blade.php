@extends('layouts.html')

@section('content')
    <x-header class="p-l-5" />

    <div class="w-full bg-white flex justify-center pt-12">
        @include('sections.div-form', [
            'titulo' => $titulo,
            'rutaSiguiente' => $rutaSiguiente,
            'yield' => $yield,
        ])
    </div>

    <script src={{ asset('js/codevalidation/code.js') }}></script>
@endsection
