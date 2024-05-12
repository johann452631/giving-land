<div class="menu-opciones-lateral">
    @pushOnce('scripts')
        <script>
            Livewire.on('section-changed', function() {
                window.scrollTo(0, 0); // Resetting scroll to top
            });
        </script>
    @endPushOnce
    <a class="inline-block boton-base verde-blanco" href="">Publicar artículo</a>
    {{-- <ul class="flex flex-col mt-3">
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
    </ul> --}}
    <div>
        <div>
            <input wire:model="section" wire:change="navigate" type="radio" value="profile" id="profile" name="section"
                hidden />
            <label class="hover-gris-claro p-2 rounded flex items-center" for="profile">
                <img class="size-8"
                    @if ($profile->user->google_id == null) src="{{ asset('/storage/users_profile_images/' . $profile->image->url) }}"
                @else
                src="{{ $profile->image->url }}" alt="" @endif>
                <p>{{ $profile->user->name }}</p>
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
    </div>
</div>
