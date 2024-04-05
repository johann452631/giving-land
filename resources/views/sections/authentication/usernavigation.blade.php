@include('layouts.head',['titulo'=>$titulo])
</head>
<body>
    @yield($yield)
    <a href={{route('home')}}>Ir al home</a>
@include('layouts.foot')