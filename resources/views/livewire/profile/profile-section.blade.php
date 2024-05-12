<div>
    @switch($section)
        @case('profile')
            @include('sections.profile.show')
        @break

        @case('favorites')
            <div>publicaciones guardadas</div>
        @break

        @case('settlements-history')
            <div>Historial de movimientos</div>
        @break

        @case('security-privacy')
            <div class="mt-4">
                <a href="">Actualizar datos personales</a>
                <hr class="my-4">
                <a href="">Cambiar contraseña</a>
                <hr class="my-4">
                <a href="">Eliminar cuenta</a>
            </div>
        @break

        @default
    @endswitch
</div>
