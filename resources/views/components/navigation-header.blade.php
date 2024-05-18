<div {{ $attributes->merge(['class' => 'z-10 fixed top-0 py-2 bg-gris-claro w-full']) }}>
    <div class="navigation-header screen-size">
        <a class="flex items-center" href="{{route('home')}}">
            <img class="size-12" src="{{asset('appicons/logo-verde.svg')}}" alt="">
            <p class="texto-verde font-bold text-xl ml-3 inline-block">Giving-Land</p>
        </a>

        <div class="buscador flex items-center">
            <label for="txtbuscador">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray"
                    class="bi bi-search" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                </svg>
            </label>
            <input class="w-100" type="text" name="txtbuscador" placeholder="Buscar">
        </div>

        {{-- atenticado --}}
        <div class="navigation-header-options relative">
            @auth
                <img class="size-10 redondo cursor-pointer dropdown-button" id="userOptionsButton"
                    @if ($user->google_id == null) src="{{ asset('/storage/users_profile_images/' . $user->profile->image->url) }}"
                @else
                src="{{ $user->profile->image->url }}" alt="" @endif>

                <div class="dropdown-menu absolute right-0 mt-2 w-56 top-8 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
                    role="menu" aria-orientation="vertical" aria-labelledby="userOptionsButton" tabindex="-1"
                    id="userOptionsMenu">
                    <div class="py-1" role="none">
                        <a href="{{route('profile.show',$user->username)}}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                            id="menu-item-0">Perfil</a>
                        <hr>
                        <form method="POST" action={{ route('app.logout') }} role="none">
                            @csrf
                            <a onclick="this.closest('form').submit()" type="submit"
                                class="text-gray-700 block w-full px-4 py-2 text-left text-sm cursor-pointer"
                                role="menuitem" tabindex="-1" id="menu-item-3">Sign out</a>
                        </form>
                    </div>
                </div>
                <script>
                    const userOptionsButton = document.querySelector('#userOptionsButton');
                    const userOptionsMenu = document.querySelector("#userOptionsMenu");

                    userOptionsButton.addEventListener('click', toggleDropdown);

                    function toggleDropdown() {
                        userOptionsMenu.classList.toggle("hidden");
                    }
                </script>

            @endauth
            @guest
                <a class="boton-base verde-blanco ps-3 pe-3 pt-1 pb-1 me-2" href={{ route('login.index') }}>Inicio
                    sesion</a>
                <a class="boton-base verde-blanco ps-3 pe-3 pt-1 pb-1" href={{ route('signup.index') }}>Registro</a>
            @endguest
        </div>

    </div>
    <!-- link inicio - logo -->


</div>
