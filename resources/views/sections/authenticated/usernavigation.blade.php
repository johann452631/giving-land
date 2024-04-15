@include('layouts.head', ['titulo' => $titulo])

@yield($yield)
<a href={{ route('home') }}>Ir al home</a>

@include('layouts.foot')
