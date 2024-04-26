<x-html>
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/user-index.css') }}">
        <link rel="stylesheet" href="{{ asset('css/user-show.css') }}">
    </x-slot>
    <x-navigation-header />
    <x-user-index>
        <div class="">
            <div class="flex sticky top-20 bg-gris-claro p-4 rounded-lg">
                @if ($user->google_id == null)
                    <img src="{{ asset('storage/users_profile_images/' . $user->url_profile_img) }}" alt=""
                        class="profile-img">
                @else
                    <img src="{{ $user->url_profile_img }}" alt="" class="profile-img">
                @endif
                <div class="flex flex-col">
                    <h1 class="text-2xl">{{ $user->name }}</h1>
                    {{-- <br> --}}
                    <p>{{ $user->email }}</p>
                    @if ($user->google_id == null)
                        <a class="mt-2" href="{{ route('users.edit', $user->username) }}">Editar perfil</a>
                    @endif
                </div>
            </div>
            <div class="posts">
            </div>
        </div>
    </x-user-index>
</x-html>
