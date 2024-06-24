<x-profile.index>

    {{-- favoritos --}}
    @persist('favoritos')
        @foreach ($favorites as $favorite)
            <div class="border-4 border-black mb-8">
                {{$favorite}}
            </div>
        @endforeach
    @endpersist
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</x-profile.index>
