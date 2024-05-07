<x-html>
    @pushOnce('links')
        <link rel="stylesheet" href="{{ asset('css/profile-index.css') }}">
        <link rel="stylesheet" href="{{ asset('css/profile-show.css') }}">
    @endPushOnce
    <x-navigation-header />
    <x-profile-index>
        <div class="flex flex-col">
            <div class="flex flex-col">
                <div class="flex">

                    <img class="profile-img"
                        @if ($profile->user->google_id == null) src="{{ asset('/storage/users_profile_images/' . $profile->image->url) }}"
                        @else
                        src="{{ $profile->image->url }}" alt="" @endif>

                    <h2>{{ $profile->user->name }}</h2>
                </div>
                <hr class="my-4">
                <div>
                    <h2>Información de contacto</h2>
                    <ul class="flex flex-wrap">
                        @foreach ($socialMedia as $element)
                        {{$element->name}}
                            <a class="mr-6" href="#"><img class="size-8" src="{{asset('socialmediaicons/'.$element->image->url)}}" alt=""></a>
                        @endforeach
                    </ul>
                </div>
                <hr class="my-4">
                <a href="{{ route('profile.edit') }}">Editar</a>
            </div>
            <div class="posts">
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
            </div>
        </div>
    </x-profile-index>
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
</x-html>
