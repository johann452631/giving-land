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
    {{-- header --}}
    <div class="header bg-gris-claro d-flex w-100 align-items-center justify-content-between">
        <!-- link inicio - logo -->
        <a class="d-flex flex-column align-items-center text-decoration-none pe-none">
            <svg class="pe-auto" width="60" height="60" viewBox="0 0 94 80" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0 28.1185C0.26525 21.1842 2.12917 14.4497 7.16891 9.12867C11.843 4.1925 17.6284 1.35809 24.3528 0.647642C31.5002 -0.107214 37.7587 2.05375 43.3289 6.64208C44.0745 7.25633 43.9311 7.56715 43.3576 8.15919C39.5652 12.0371 35.78 15.9298 32.0379 19.8595C28.9839 23.0639 28.7043 27.8224 31.1561 31.2637C34.1742 35.4968 40.3466 35.8816 44.01 32.211C47.0711 29.1471 50.1609 26.1055 53.1933 23.0047C53.8027 22.383 54.2042 22.2646 54.706 23.0121C54.7347 23.0491 54.7705 23.0787 54.8063 23.1157C62.9861 31.4783 71.1586 39.8409 79.3312 48.2035C80.1198 49.0176 80.9227 49.8465 81.0947 51.0528C81.3457 52.8141 80.6933 54.235 79.3599 54.938C77.9691 55.6707 76.3704 55.4265 75.1374 54.198C73.4025 52.4663 71.7106 50.6901 70.0044 48.9288C66.6852 45.5098 63.366 42.0833 60.0612 38.6568C59.5665 38.1388 59.036 37.7022 58.3836 37.4061C57.509 37.0065 56.8351 37.3469 56.2688 37.9834C55.681 38.6568 55.5591 39.4413 56.0896 40.2184C56.3548 40.6032 56.6918 40.9436 57.0215 41.284C61.9107 46.3386 66.8071 51.3858 71.6891 56.4403C72.7215 57.5134 73.5961 58.6605 73.3236 60.333C72.9079 62.9084 70.4991 64.1739 68.2982 62.901C67.7032 62.5532 67.1656 62.0648 66.6781 61.5615C61.9036 56.6624 57.1434 51.7484 52.3689 46.8492C51.8814 46.346 51.3509 45.8576 50.7631 45.4949C49.8741 44.9547 49.0999 45.2729 48.4188 46.0352C47.7665 46.7678 47.8382 47.5153 48.297 48.2627C48.512 48.618 48.8346 48.914 49.1286 49.2174C54.1468 54.4052 59.1794 59.5856 64.1905 64.7734C65.7031 66.3423 65.9898 68.4218 64.9504 69.8279C63.5022 71.7891 61.2799 71.9815 59.5235 70.272C58.6489 69.4135 57.8101 68.518 56.9499 67.6448C52.1825 62.8122 47.4152 57.9797 42.6479 53.1471C41.4937 51.9778 40.3036 51.8298 39.4935 52.7401C38.7265 53.5985 38.8985 54.7604 39.9667 55.8705C45.5369 61.7021 51.1144 67.5264 56.6846 73.3654C57.8603 74.5939 58.061 76.4884 57.1864 77.8205C56.1828 79.3672 54.6056 79.8705 52.9209 79.2266C52.4621 79.049 52.1252 78.753 51.7954 78.42C50.971 77.5763 50.1824 76.6882 49.315 75.8964C48.1894 74.8677 47.6159 73.8908 47.8668 72.0999C48.4332 68.0444 45.8739 64.7142 41.8091 63.8261C40.7123 63.5893 40.2176 63.2785 40.0025 62.0278C39.4147 58.6383 37.4146 56.4922 34.0667 55.8557C32.9698 55.6485 32.4107 55.2045 32.1741 53.9168C31.5289 50.4977 29.5144 48.322 26.0518 47.7965C25.1916 47.6633 24.7256 47.2489 24.5105 46.2794C23.7004 42.6531 21.7146 40.1888 17.9366 39.6633C15.5565 39.3303 13.5923 40.2332 11.8646 41.8243C10.4523 43.1342 9.06868 44.4811 7.68508 45.8206C7.29079 46.2054 7.0112 46.5458 6.46636 45.8946C2.27255 40.8918 0.0573513 35.1194 0 28.1185Z" />
                <path
                    d="M33.4359 26.2981C33.486 24.781 33.8517 23.6931 34.7263 22.7977C39.4936 17.8985 44.1462 12.8735 49.0354 8.10757C53.731 3.53403 59.373 0.884638 65.8967 0.684824C73.6104 0.440606 80.6073 2.65337 86.0843 8.40359C90.7513 13.3028 93.4612 19.3194 93.9343 26.2981C94.4505 33.9207 91.8983 40.4184 87.2887 46.1834C86.6148 47.0196 86.0628 48.5071 85.1452 48.4405C84.328 48.3813 83.5537 47.1158 82.8297 46.3166C77.2522 40.2259 71.5458 34.2685 65.7103 28.4517C62.004 24.7588 58.3837 20.9919 54.7132 17.262C54.1182 16.6552 53.8027 16.5886 53.1862 17.2472C50.7631 19.8226 48.2827 22.3462 45.7951 24.8624C44.2394 26.4387 42.6766 28.0002 41.0492 29.4951C39.5796 30.8494 37.8447 31.2639 36.0525 30.2648C34.461 29.3841 33.4215 28.0224 33.4287 26.2981H33.4359Z" />
                <path
                    d="M20.6465 47.4637C20.6967 48.0188 20.5103 48.559 20.1733 49.0252C18.9044 50.8014 17.4276 52.3851 15.7143 53.6876C14.1514 54.8791 12.309 54.6571 11.0688 53.2806C9.82859 51.9115 9.69238 50.1723 10.9684 48.6256C12.3377 46.9679 13.7787 45.362 15.5637 44.1113C17.9151 42.461 20.7397 44.9845 20.6393 47.4637H20.6465Z" />
                <path
                    d="M28.4462 55.1529C28.4964 56.2185 28.0806 57.1436 27.4139 57.8837C26.1593 59.2824 24.912 60.7033 23.4065 61.8282C22.1519 62.768 20.6034 62.7236 19.4492 61.7098C17.9724 60.4147 17.4563 58.8975 18.3954 57.4692C19.9367 55.1233 21.5426 52.6959 24.3671 51.8226C26.3099 51.2232 28.4176 53.0511 28.4462 55.1455V55.1529Z" />
                <path
                    d="M29.3639 70.5534C27.8943 70.3314 26.7186 69.6876 26.0734 68.2518C25.3995 66.7643 25.7723 65.4618 26.8189 64.337C27.9373 63.1307 29.0843 61.9466 30.2528 60.7921C31.701 59.3712 33.5362 59.3194 35.0058 60.5923C36.3106 61.732 36.5902 63.6487 35.5937 65.2324C34.3965 67.1344 32.7763 68.6293 31.0486 69.991C30.5683 70.3684 29.9661 70.4942 29.3639 70.5534Z" />
                <path
                    d="M40.5546 67.682C41.8307 67.7782 42.8702 68.3111 43.5082 69.4878C44.1606 70.6867 44.3685 72.0262 43.5369 73.1436C42.1604 74.9938 40.612 76.7181 38.6763 77.9762C37.2211 78.9235 35.8231 78.6718 34.5686 77.3249C33.4 76.0669 33.1133 74.3425 34.1169 73.04C35.4647 71.2861 37.0275 69.7024 38.7265 68.2963C39.2212 67.8893 39.852 67.6228 40.5474 67.6746L40.5546 67.682Z" />
            </svg>
            <span class="texto-verde fw-bold pe-auto">Giving-Land</span>
        </a>
        <!-- Buscador -->
        <div class="buscador d-flex align-items-center">
            <label for="txtbuscador">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="gray"
                    class="bi bi-search" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                </svg>
            </label>
            <input class="w-100" type="text" name="txtbuscador" placeholder="Buscar">
        </div>
        @yield('auth')
    </div>

    {{-- Filtro lateral --}}
    <nav class="filtro-lateral">
        @auth
            <a class="btn-publicar boton-base d-block pt-2 pb-2 gris-blanco text-center hover-verde"
                href={{ route('user.newpost') }}>
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
        @session('alert')
            <div class="alerta alert alert-{{ session('alert')['type'] }}" id="divAlert">
                {{ session('alert')['message'] }}
            </div>
            @php
                session()->forget('alert');
            @endphp
            <script>
                divAlert = document.getElementById('divAlert');
                setTimeout(function() {
                    divAlert.remove();
                }, 3500);
            </script>
        @endsession


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
                            <label for="checkCorazon{{ $product->id }}" class="bg-light rounded-circle p-1 cliqueable"
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
