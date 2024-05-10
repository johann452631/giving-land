@props(['profile'])
<div class="contenido-main screen-size">
    <div class="menu-opciones-lateral">
        <a class="inline-block boton-base verde-blanco" href="">Publicar artículo</a>
        <ul class="flex flex-col mt-3">
            <a class="hover-gris-claro p-2 rounded flex" href="{{route('profile.show')}}">
                <img class="size-8"
                        @if ($profile->user->google_id == null) src="{{ asset('/storage/users_profile_images/' . $profile->image->url) }}"
                        @else
                        src="{{ $profile->image->url }}" alt="" @endif>
                <p>{{$profile->user->name}}</p>
            </a>
            <a class="hover-gris-claro p-2 rounded" href="{{route('favorites.index')}}">Publicaciones guardadas</a>
            <a class="hover-gris-claro p-2 rounded" href="{{route('settlements.index')}}">Historial de movimientos</a>
            <a class="hover-gris-claro p-2 rounded" href="{{route('securityPrivacy')}}">Seguridad y privacidad</a>
        </ul>
    </div>
    {{$slot}}
    <x-publicidad-lateral />
</div>