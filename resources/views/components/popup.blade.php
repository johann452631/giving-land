<div class="popup fixed inset-0 bg-gray-800 bg-opacity-50 hidden z-20 px-2">
    <div {{$attributes->merge(['class' => 'mx-auto mt-32'])}}>
        {{$slot}}
    </div>
</div>