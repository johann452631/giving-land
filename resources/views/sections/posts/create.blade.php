<x-html>

    @pushOnce('links')
        <link rel="stylesheet" href="{{ asset('css/posts/create.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @endPushOnce

    {{-- header --}}
    <x-header />

    {{-- main --}}
    <main class="pt-24 pb-6 px-2 screen-size">
        <div class="bg-gris-claro rounded px-6 py-10 max-w-3xl my-0 mx-auto">
            <h1 class="texto-verde text-3xl text-center mb-8">Publicación de artículo</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="w-full">
                    <div id="carousel" class="relative overflow-hidden rounded-lg bg-gray-200 h-80">
                        <label id="big_label_images" for="image_input"
                            class="absolute top-0 left-0 w-full h-full grid place-items-center cursor-pointer z-10">
                            <div>
                                <i class="fa-solid fa-image text-6xl"></i>
                                <i class="fa-solid fa-plus text-2xl"></i>
                            </div>
                        </label>
                        <div id="images_container" class="h-full flex transition-transform duration-500 ease-in-out">
                        </div>
                        <button type="button" id="prevBtn"
                            class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded-full hidden">‹</button>
                        <button type="button" id="nextBtn"
                            class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded-full hidden">›</button>
                    </div>
                    <label id="small_label_images" for="image_input"
                        class="boton-base bg-blue-700 text-white hidden inline-block mt-3">Agregar</label>
                    <input type="file" id="image_input" accept="image/*" multiple
                        class="mb-4 p-2 border rounded w-full" name="images" hidden />
                </div>
                <div class="max-w-96">
                    <x-forms.input label-text="Nombre del artículo" name="name" class="mb-6" />
                    <select name="purpose" id="purpose_select" class="outline-none bg-transparent w-full mb-6 text-lg">
                        <option value="0" disabled selected>Propósito de la publicación</option>
                        <option value="d" class="text-gray-900">Donación</option>
                        <option value="i" class="text-gray-900">Intercambio</option>
                    </select>
                    <x-forms.input label-text="Artículo de interés a recibir" name="expected_item"
                        id="input_expected_item" class="mb-6 hidden" />
                    <textarea class="mb-6" name="description" id="" rows="3" placeholder="Descripción del artículo"></textarea>
                    <select name="location" class="searchable-select w-full">
                        <option value="0" disabled selected>Seleccione una ubicación</option>
                        @foreach ($locationData as $item)
                            <option class="text-gray-900" value="{{ $item->id }}">
                                {{ $item->municipio . ' (' . $item->departamento . ')' }}</option>
                        @endforeach
                    </select>
                    <select name="category" id="category_select"
                        class="outline-none bg-transparent w-full mb-6 text-lg">
                        <option value="0" disabled selected>Seleccione una categoría</option>
                        @foreach ($categories as $category)
                            <option class="text-gray-900" value="{{ $category->id }}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </main>

    {{-- footer --}}
    <x-footer />
    <script src="{{ asset('js/posts/create.js') }}"></script>

</x-html>
