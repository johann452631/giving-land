<x-html titulo-pagina="Giving Land">
    @pushOnce('links')
        <link rel="stylesheet" href={{ asset('css/home.css') }}>
        @auth
            <link rel="stylesheet" href={{ asset('css/auth-home.css') }}>
        @endauth
        @guest
            <link rel="stylesheet" href={{ asset('css/guest-home.css') }}>
        @endguest
    @endPushOnce
    <x-header/>
    {{-- <x-simple-header/> --}}

    {{-- main --}}
    <div class="contenido-main screen-size">
        {{-- Filtro lateral --}}
        <div class="menu-opciones-lateral">
            @auth
                <a class="btn-publicar boton-base block pt-2 pb-2 gris-blanco text-center hover-verde" href="#">
                    Publicar artículo
                </a>
            @endauth
            <div class="bg-gris-claro mt-3 ps-2 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-filter" viewBox="0 0 16 16">
                    <path
                        d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                </svg>
                <span class="ps-2 pt-1 pb-1 fw-bold">Filtro</span>
            </div>
            <ul class="flex flex-col">
                <a href="{{ route('home') }}">Ver todo</a>
                @foreach ($categories as $category)
                    <a href="{{ route('home', $category->name) }}">{{ $category->name }}</a>
                @endforeach
            </ul>
        </div>
        {{-- posts --}}
        <div class="articulos" id="divArticulos">
            <div class="info-main w-full m-2 rounded"></div>
            {{-- <div>{{dd(request()->routeIs('posts'))}}</div> --}}
            @foreach ($posts as $post)
                <div class="tarjeta bg-gris-claro">
                    <div class="foto-tarjeta bg-gris">
                        @foreach ($post->images as $image)
                            <img src={{ asset("storage/posts_images/" . $post->user->username . "/" . $image->url) }} alt="">
                        @endforeach
                    </div>
                    <div class="info-tarjeta relative">
                        <div class="texto-tarjeta ps-3 pt-2 pb-2">
                            <h5 class="text-xl text-gray-900 font-semibold">{{ $post->name }}</h5>
                            <p class="w-full">{{ $post->description }}</p>
                            <span class="texto-verde font-bold">{{ $post->purpose }}</span>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                    <path
                                        d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                </svg>
                                <span>{{ $post->location }}</span>
                            </div>
                        </div>
                        <div class="boton-favorito absolute top-0 right-0">
                            <input type="checkbox" id="checkCorazon{{ $post->id }}" class="inhabilitable">
                            <label for="checkCorazon{{ $post->id }}" class="bg-light rounded p-1 cliqueable"
                                id="labelCorazon">
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
        {{-- publicidad lateral --}}
        <x-publicidad-lateral />
    </div>

    {{-- footer --}}
    <x-footer />
    @auth
        <script src={{ asset('js/auth-home.js') }}></script>
    @endauth
    @guest
        <script src={{ asset('js/guest-home.js') }}></script>
    @endguest
</x-html>
