<div class="div-form bg-gris-claro">
    <form class="form-auth" action={{ route($rutaSiguiente) }} method="POST">
        @csrf
        @yield($yield)
    </form>
</div>
