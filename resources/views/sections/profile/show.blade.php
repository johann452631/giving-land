<x-profile.index>
    <div class="">
        <div class="flex py-4">
            <img class="size-8 redondo mr-3" src="{{$profile->getProfileImageUrl()}}" alt="">

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
    <div class="posts my-4">
        @if (count($profile->user->posts))
            @foreach ($profile->user->posts as $post)
                <div class="flex mt-8 border-4">
                    <div class="flex overflow-x-auto scrollbar-hide">
                        @foreach ($post->images as $image)
                            <div class="flex-none mx-2">
                                <div class="border rounded-lg p-4 shadow-md">
                                    <img src="{{ asset('/storage/posts_images/' . $post->user->username . '/' . $image->url) }}"
                                        alt="">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="scroll-left">&lt;</button>
                    <button class="scroll-right">&gt;</button>
                    <div>
                        <p>{{ $post->name }}</p>
                        <p>{{ $post->category->name }}</p>
                        <p>{{ $post->purpose }}</p>
                        <p>{{ $post->location }}</p>
                    </div>
                </div>
                @pushOnce('modals')
                    <x-popup>

                    </x-popup>
                @endPushOnce
            @endforeach
        @else
            <p class="text-2xl font-bold">No has hecho ninguna publicación aún</p>
        @endif
    </div>
</x-profile.index>
