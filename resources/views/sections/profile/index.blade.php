<x-html>
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/user-index.css') }}">
    </x-slot>
    <x-navigation-header />
    <x-user-index>
        @include($content)
    </x-user-index>
    @if ($content == 'email-code')
        <script src="{{ asset('js/codevalidation/code.js') }}"></script>
    @endif
</x-html>
