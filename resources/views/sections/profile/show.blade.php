<x-profile.index>
    <div class="border-b pb-4">
        <div class="flex py-4 items-center">
            <img class="size-12 redondo mr-3" src="{{ $profile->getProfileImageUrl() }}" alt="">

            <h2 class="text-2xl">{{ $profile->user->name }}</h2>
            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex aspernatur quisquam est omnis sit saepe excepturi temporibus aliquid maxime. Quaerat error nesciunt consectetur veritatis repudiandae hic doloribus autem fugiat consequuntur?</p> --}}
        </div>
        @if (count($profile->socialMedia))
            <hr>
            <div class="py-4">
                <h2 class="text-xl texto-verde mb-2">Redes sociales</h2>
                <ul class="flex flex-wrap gap-x-3">
                    @foreach ($profile->socialMedia as $item)
                        <a href="{{ $item->url . $item->pivot->username }}" target="_blank"><img class="size-8"
                                src="{{ asset('socialmediaicons/' . $item->image->url) }}" alt=""></a>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (count($profile->contactInformation))
            <hr>
            <div class="py-4">
                <h2 class="text-xl texto-verde">Información de contacto</h2>
                <ul class="flex flex-col gap-y-3">
                    @foreach ($profile->contactInformation as $item)
                        @if ($item->is_link)
                            <label>
                                {{ $item->name . ':' }}
                                <a target="_blank" class="text-blue-600 cursor-pointer hover:text-blue-400"
                                    href="{{ $item->info }}">{{ $item->info }}</a>
                            </label>
                        @else
                            <p>{{ $item->name . ' : ' . $item->info }}</p>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endif
        @owner($profile)
            <hr class="my-4">
            <a class="boton-base bg-yellow-300" href="{{ route('profile.edit') }}">Editar perfil</a>
        @endowner
    </div>

    {{-- posts --}}
    <div class="mt-8 mb-4">
        @if (count($posts))
            <h2 class="text-gray-900 text-4xl text-center">Publicaciones</h2>
            @foreach ($posts as $post)
                <div class="mt-10 rounded w-full bg-gris-claro shadow-md">
                    <div class="relative w-full h-72 overflow-y-hidden" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div class="relative overflow-hidden rounded-lg h-96">
                            @foreach ($post->images as $image)
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('storage/posts_images/' . $profile->user->username . '/' . $image->url) }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                            @endforeach
                        </div>
                        @if (count($post->images) > 1)
                            <!-- Slider controls -->
                            <button type="button"
                                class="absolute top-1/2 start-0 z-30 flex items-center justify-center p-4 cursor-pointer group focus:outline-none"
                                data-carousel-prev>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 1 1 5l4 4" />
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button"
                                class="absolute top-1/2 z-30 end-0 flex items-center justify-center p-4 cursor-pointer group focus:outline-none"
                                data-carousel-next>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        @endif
                    </div>
                    <div class="px-6 py-4 md:px-8 relative">
                        @owner($profile)
                            <div class="dropdown absolute right-2">
                                <i
                                    class="fa-solid fa-ellipsis text-xl leading-none bg-gray-300 rounded-md px-2 cursor-pointer dropdown-button"></i>
                                <div
                                    class="dropdown-menu absolute right-0 my-2 w-56 top-full z-30 rounded-md bg-white shadow-lg hidden">
                                    <div class="py-1">
                                        <a href="{{ route('posts.edit', $post->user_post_index) }}"
                                            class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100">Editar</a>
                                        <hr>
                                        <button data-show-popup="#popup_post_{{$post->user_post_index}}"
                                            class="text-gray-700 w-full text-start px-4 py-2 text-sm hover:bg-gray-100">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        @endowner
                        <h2 class="text-gray-800 text-3xl font-bold mb-2">{{ $post->name }}</h2>
                        <p class="py-1 text-ellipsis overflow-hidden max-h-32 md:max-h-20 mb-2">
                            {{ $post->description }}</p>
                        <span class="texto-verde font-bold text-xl capitalize">{{ $post->getPurpose() }}</span>
                        @isset($post->expected_item)
                            <div class="mb-4">
                                <h6 class="text-green-900">Producto de interés a recibir</h6>
                                <span>{{ $post->expected_item }}</span>
                            </div>
                        @endisset
                        <p class="my-3"><i class="fa-solid fa-location-dot text-gray-700 mr-1"></i>
                            {{ $post->location->municipio . ' (' . $post->location->departamento . ')' }}</p>
                        <p class="font-bold">{{ $post->category->name }}</p>
                    </div>
                </div>
                @push('modals')
                    <x-popup id="popup_post_{{$post->user_post_index}}" max-width='md'>
                        <x-form ruta-siguiente='posts.destroy' :parametro="$post->id" metodo="DELETE" class="p-8 bg-gris-claro rounded-md">
                            <p>¿Confirmas eliminar la publicación <b>{{$post->name}}</b>?</p>
                            <div>
                                <button type="submit" class="bg-red-600 text-gray-200 boton-base">Confirmar</button>
                                <button type="button" class="popup-closer bg-gray-500 text-gray-200 boton-base">Cancelar</button>
                            </div>
                        </x-form>
                    </x-popup>
                @endpush
            @endforeach
        @else
            <p class="text-2xl font-bold">No has hecho ninguna publicación aún</p>
        @endif
    </div>
    <script src="{{ asset('js/profile/show.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</x-profile.index>
