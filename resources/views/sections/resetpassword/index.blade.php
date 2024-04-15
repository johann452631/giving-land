@extends('layouts.html')
@section('content')
    <x-header class="pl-5" />

    <div class="flex justify-center pt-12">
        @include('sections.div-form', [
            'titulo' => $titulo,
            'rutaSiguiente' => $rutaSiguiente,
            'yield' => $yield,
        ])
    </div>
    
@endsection