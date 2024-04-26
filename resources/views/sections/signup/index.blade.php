<x-html>
    <x-slot:links>
        <link rel="stylesheet" href="{{asset('css/signup.css')}}">
    </x-slot>
    <x-header class="p-3"/>
    <div class="px-4 pt-10">
        <x-form-parameter :ruta-siguiente="$rutaSiguiente" class="signup-form">
            @include("sections.signup.$content")
        </x-form-parameter>
    </div>
    @if ($content == 'code')
        <script src="{{asset('js/codevalidation/code.js')}}"></script>
    @endif
</x-html>
