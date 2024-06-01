<div class="flex flex-col">
    <div class="">
        <div class="flex py-4">
            <img class="size-8 redondo mr-3"
                @if ($profile->google_avatar === null) src="{{ asset('/storage/users_profile_images/' . $profile->image->url) }}"
                    @else
                    src="{{ $profile->google_avatar }}" alt="" @endif>

            <h2 class="text-2xl">{{ $profile->user->name }}</h2>
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
    <div class="posts my-4">
        @if (!count($profile->user->posts))
            <p class="text-2xl font-bold">No has hecho ninguna publicación aún</p>
        @else
            @foreach ($profile->user->posts as $post)
                <div class="flex mt-8 border-4">
                    <div class="flex overflow-x-auto scrollbar-hide">
                        @foreach ($post->images as $image)
                            <div class="flex-none w-64 mx-2">
                                <div class="border rounded-lg p-4 shadow-md">
                                    <img src="{{ asset('/storage/posts_images/' . $post->user->username . '/' . $image->url) }}" alt="">
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
            @endforeach
        @endif
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.querySelector('.overflow-x-auto');
        const scrollRight = () => {
            container.scrollBy({
                left: 200, // Cambia este valor según sea necesario para ajustar la cantidad de desplazamiento
                behavior: 'smooth',
            });
        };
        const scrollLeft = () => {
            container.scrollBy({
                left: -
                    200, // Cambia este valor según sea necesario para ajustar la cantidad de desplazamiento
                behavior: 'smooth',
            });
        };
        document.querySelector('.scroll-right').addEventListener('click', scrollRight);
        document.querySelector('.scroll-left').addEventListener('click', scrollLeft);
    });
</script>
