<div class="div-form bg-gris-claro p-5">
    <h2 class="text-center texto-verde pb-2">{{ $titulo }}</h2>
    <form class="flex-column" action={{ route($rutaSiguiente) }} method="POST">
        @csrf
        @yield($yield)
    </form>
</div>
