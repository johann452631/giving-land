@include('layouts.head',['titulo' => 'Giving-Land - Registro'])
<link rel="stylesheet" href={{ asset('css/signup.css') }}>
</head>
<body>
    <x-header class="pl-5"/>
    <div class="flex justify-center pt-12 pb-5">
        @include('sections.divform',[
            'titulo' => $titulo,
            'rutaSiguiente' => $rutaSiguiente,
            'yield' => $yield
        ])
    </div>
    @session('code')
        <script src={{asset('js/signup/code.js')}}></script>
    @endsession
@include('layouts.foot')