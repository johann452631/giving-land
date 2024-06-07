<div class="menu-opciones-lateral">
    <a class="inline-block boton-base verde-blanco mb-4" href="{{route('posts.create')}}">Publicar artículo</a>
    <div class="flex flex-col">
        <a wire:navigate @class([
            'hover-gris-claro p-2 rounded flex items-center',
            'border-l-4 border-green-700' => $section == 'profile',
        ]) href="{{ route('profile.show', $user->username) }}" >
            <img class="size-8 redondo"
                @if ($user->profile->google_avatar === null) src="{{ asset('/storage/users_profile_images/' . $user->profile->image->url) }}"
            @else
            src="{{ $user->profile->google_avatar }}" alt="" @endif>
            <p>{{ $user->name }}</p>
        </a>
        @isset($section)
            <a wire:navigate @class([
                'hover-gris-claro p-2 rounded flex items-center',
                'border-l-4 border-green-700' => $section == 'favorites',
            ])
                href="{{ route('profile.section', [
                    'username' => $user->username,
                    'section' => 'favorites',
                ]) }}"
                >
                Favoritos
            </a>

            <a wire:navigate @class([
                'hover-gris-claro p-2 rounded flex items-center',
                'border-l-4 border-green-700' => $section == 'settlements-history',
            ])
                href="{{ route('profile.section', [
                    'username' => $user->username,
                    'section' => 'settlements-history',
                ]) }}"
                >
                Historial de movimientos
            </a>
        @endisset
    </div>
</div>
