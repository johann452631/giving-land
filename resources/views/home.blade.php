@include('layouts.head', ['titulo' => 'Giving-Land - Home'])
<link rel="stylesheet" href={{ asset('css/home/home.css') }}>
@auth
    <link rel="stylesheet" href={{ asset('css/home/auth.css') }}>
@endauth
@guest
    <link rel="stylesheet" href={{ asset('css/home/guest.css') }}>
@endguest
</head>

<body>
    @include('layouts.popup', [
        'id' => 'Login',
        'content' => 'form-login',
    ])
    <x-header class="justify-between items-center">
        <x-alert color="green"/>

        <!-- Buscador -->
        <div class="buscador flex items-center">
            <label for="txtbuscador">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="gray" class="bi bi-search"
                    viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                </svg>
            </label>
            <input class="w-100" type="text" name="txtbuscador" placeholder="Buscar">
        </div>
        @auth
            <div class="relative inline-block text-left">
                <div>
                    <button type="button"
                        class="dropdown-button inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                        id="userOptionsButton" aria-expanded="true" aria-haspopup="true">
                        Options
                        <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <div class="dropdown-menu absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
                    role="menu" aria-orientation="vertical" aria-labelledby="userOptionsButton" tabindex="-1"
                    id="userOptionsMenu">
                    <div class="py-1" role="none">
                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                            id="menu-item-0">Perfil</a>
                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                            id="menu-item-1">Configuración</a>
                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                            id="menu-item-2">License</a>
                        <hr>
                        <form method="POST" action={{ route('app.logout') }} role="none">
                            @csrf
                            <a onclick="this.closest('form').submit()" type="submit"
                                class="text-gray-700 block w-full px-4 py-2 text-left text-sm cursor-pointer"
                                role="menuitem" tabindex="-1" id="menu-item-3">Sign out</a>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                const button = document.querySelector('#userOptionsButton');
                const dropdown = document.querySelector("#userOptionsMenu");

                button.addEventListener('click', toggleDropdown);

                function toggleDropdown() {
                    dropdown.classList.toggle("hidden");
                }
            </script>

        @endauth
        @guest
            <div class="d-flex">
                <button class="boton-base verde-blanco ps-3 pe-3 pt-1 pb-1 me-2" id="buttonLogin">Inicio sesion</button>
                <a class="boton-base verde-blanco ps-3 pe-3 pt-1 pb-1" href={{ route('app.showSignup') }}>Registro</a>
            </div>
        @endguest
    </x-header>

    {{-- Filtro lateral --}}
    <nav class="filtro-lateral">
        @auth
            <a class="btn-publicar boton-base d-block pt-2 pb-2 gris-blanco text-center hover-verde"
                href={{ route('users.products.create', auth()->user()->username) }}>
                Publicar artículo
            </a>
        @endauth
        <div class="bg-gris-claro mt-3 ps-2 d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                class="bi bi-filter" viewBox="0 0 16 16">
                <path
                    d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
            </svg>
            <span class="ps-2 pt-1 pb-1 fw-bold">Filtro</span>
        </div>
        <ul class="text-decoration-none">
            <li>
                <input type="radio" name="filtro-categoria" id="radioElectronica">
                <label for="radioElectronica">Electrónica</label>
            </li>
            <li>
                <input type="radio" name="filtro-categoria" id="radioelectrodomesticos">
                <label for="radioelectrodomesticos">Electrodomésticos</label>
            </li>
            <li>
                <input type="radio" name="filtro-categoria" id="radioVehiculos">
                <label for="radioVehiculos">Vehículos</label>
            </li>
            <li>
                <input type="radio" name="filtro-categoria" id="radioJojasRelojes">
                <label for="radioJojasRelojes">Joyas y relojes</label>
            </li>
            <li>
                <input type="radio" name="filtro-categoria" id="radioRopaCalzado">
                <label for="radioRopaCalzado">Ropa y calzado</label>
            </li>
        </ul>
    </nav>

    {{-- publicidad lateral --}}
    <div class="publicidad-lateral"></div>

    {{-- main --}}
    <div class="contenido-main position-relative w-100">
        {{-- artículos --}}
        <div class="articulos w-100 d-flex flex-wrap justify-content-around" id="divArticulos">
            <div class="info-main w-100 m-2 rounded"></div>
            @foreach ($products as $product)
                <div class="tarjeta bg-gris-claro ${articulos[i].categoria}">
                    <div class="foto-tarjeta bg-gris">
                        <img src={{ asset("img/{$product->images}") }} alt="">
                    </div>
                    <div class="info-tarjeta position-relative">
                        <div class="texto-tarjeta ps-3 pt-2 pb-2">
                            <h5>{{ $product->name }}</h5>
                            <p class="w-100">{{ $product->description }}</p>
                            <span class="texto-verde fw-bold">{{ $product->purpose }}</span>
                            <div class="d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                    <path
                                        d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                </svg>
                                <span>{{ $product->location }}</span>
                            </div>
                        </div>
                        <div class="boton-favorito position-absolute top-0 end-0">
                            <input type="checkbox" name="" id="checkCorazon{{ $product->id }}"
                                class="inhabilitable">
                            <label for="checkCorazon{{ $product->id }}"
                                class="bg-light rounded-circle p-1 cliqueable" id="labelCorazon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="#167250" fill-rule="evenodd">
                                    <path
                                        d="M5.624 4.424C3.965 5.182 2.75 6.986 2.75 9.137c0 2.197.9 3.891 2.188 5.343c1.063 1.196 2.349 2.188 3.603 3.154c.298.23.594.459.885.688c.526.415.995.778 1.448 1.043c.452.264.816.385 1.126.385c.31 0 .674-.12 1.126-.385c.453-.265.922-.628 1.448-1.043c.29-.23.587-.458.885-.687c1.254-.968 2.54-1.959 3.603-3.155c1.289-1.452 2.188-3.146 2.188-5.343c0-2.15-1.215-3.955-2.874-4.713c-1.612-.737-3.778-.542-5.836 1.597a.75.75 0 0 1-1.08 0C9.402 3.882 7.236 3.687 5.624 4.424M12 4.46C9.688 2.39 7.099 2.1 5 3.059C2.786 4.074 1.25 6.426 1.25 9.138c0 2.665 1.11 4.699 2.567 6.339c1.166 1.313 2.593 2.412 3.854 3.382c.286.22.563.434.826.642c.513.404 1.063.834 1.62 1.16c.557.325 1.193.59 1.883.59s1.326-.265 1.883-.59c.558-.326 1.107-.756 1.62-1.16a78.6 78.6 0 0 1 .826-.642c1.26-.97 2.688-2.07 3.854-3.382c1.457-1.64 2.567-3.674 2.567-6.339c0-2.712-1.535-5.064-3.75-6.077c-2.099-.96-4.688-.67-7 1.399" />
                                </svg>
                            </label>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- footer --}}
    @yield('footer')
    @auth
        <script src={{ asset('js/home/auth.js') }}></script>
    @endauth
    @guest
        <script src={{ asset('js/home/guest.js') }}></script>
    @endguest

    @include('layouts.foot')
