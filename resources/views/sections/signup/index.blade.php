@extends('layouts.html')
@section('content')
    <x-header class="pl-5" />

    <div class="flex justify-center py-12">
        @include('sections.div-form', [
            'titulo' => $titulo,
            'rutaSiguiente' => $rutaSiguiente,
            'yield' => $yield,
        ])
    </div>

    @session('code')
        <script src={{ asset('js/signup/code.js') }}></script>
    @endsession
@endsection