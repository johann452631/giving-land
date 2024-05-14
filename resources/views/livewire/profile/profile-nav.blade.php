<div class="menu-opciones-lateral">
    @pushOnce('scripts')
        <script>
            Livewire.on('section-changed', function() {
                window.scrollTo(0, 0); // Resetting scroll to top
            });
        </script>
    @endPushOnce
    <a class="inline-block boton-base verde-blanco mb-4" href="">Publicar artículo</a>
    @if ($user->id == $profile->user->id)
        <div>
            <input type="radio" wire:model="section" wire:change="navigate" value="profile" id="profile" name="section"
                hidden />
            <label class="hover-gris-claro p-2 rounded flex items-center" for="profile">
                <img class="size-8 redondo"
                    @if ($user->google_id == null) src="{{ asset('/storage/users_profile_images/' . $user->profile->image->url) }}"
            @else
            src="{{ $user->profile->image->url }}" alt="" @endif>
                <p>{{ $user->name }}</p>
            </label>
        </div>
        <div>
            <input type="radio" wire:change="navigate" wire:model="section" value="favorites" id="favorites"
                name="section" hidden />
            <label class="hover-gris-claro p-2 rounded flex" for="favorites">Publicaciones guardadas</label>
        </div>
        <div>
            <input type="radio" wire:change="navigate" wire:model="section" value="settlements-history"
                id="settlements-history" name="section" hidden />
            <label class="hover-gris-claro p-2 rounded flex" for="settlements-history">Historial de movimientos</label>
        </div>
        <div>
            <input type="radio" wire:change="navigate" wire:model="section" value="security-privacy"
                id="security-privacy" name="section" hidden />
            <label class="hover-gris-claro p-2 rounded flex" for="security-privacy">Seguridad y privacidad</label>
        </div>
    @else
        <a class="hover-gris-claro p-2 rounded flex items-center" href="{{route('profile.show',$user->username)}}">
            <img class="size-8 redondo"
                @if ($user->google_id == null) src="{{ asset('/storage/users_profile_images/' . $user->profile->image->url) }}"
            @else
            src="{{ $user->profile->image->url }}" alt="" @endif>
            <p>{{ $user->name }}</p>
        </a>
    @endif
</div>
