<form action={{ route($rutaSiguiente, $parametro) }} method="POST"
    {{ $attributes->merge(['class' => 'bg-gris-claro']) }}>
    @csrf
    @isset($metodo)
        @method($metodo)
    @endisset
    {{ $slot }}
</form>
