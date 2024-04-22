<form action={{ route($rutaSiguiente) }} method="POST"
    {{ $attributes->merge(['class' => 'bg-gris-claro']) }}>
    @csrf
    @isset($metodo)
        @method($metodo)
    @endisset
    {{ $slot }}
</form>