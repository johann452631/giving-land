<div class="flex flex-col">
    <div class="flex flex-col">
        <div class="flex">

            <img class="size-8"
                @if ($profile->user->google_id == null) src="{{ asset('/storage/users_profile_images/' . $profile->image->url) }}"
                    @else
                    src="{{ $profile->image->url }}" alt="" @endif>

            <h2>{{ $profile->user->name }}</h2>
        </div>
        @if (count($socialMedia))
            <hr class="my-4">
            <div>
                <h2>Información de contacto</h2>
                <ul class="flex flex-wrap">
                    @foreach ($socialMedia as $element)
                        <a class="mr-6" href="#"><img class="size-8"
                                src="{{ asset('socialmediaicons/' . $element->image->url) }}" alt=""></a>
                    @endforeach
                </ul>
            </div>
        @endif
        <hr class="my-4">
        <a href="{{ route('profile.edit') }}">Editar perfil</a>
    </div>
    <div class="posts my-4">
        @if (!count($posts))
            <p class="text-2xl font-bold">No has hecho ninguna publicación aún</p>
        @else
            @foreach ($posts as $post)
                <div class="flex mt-8 border-4">
                    <div class="flex overflow-x-auto scrollbar-hide">
                        @foreach ($post->images as $image)
                            <div class="flex-none w-64 mx-2">
                                <div class="border rounded-lg p-4 shadow-md">
                                    <img src="{{ asset('/storage/posts_images/' . $image->url) }}" alt="">
                                </div>
                            </div>
                            <div class="flex-none w-64 mx-2">
                                <div class="border rounded-lg p-4 shadow-md">
                                    <img src="{{ asset('/storage/posts_images/' . $image->url) }}" alt="">
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
