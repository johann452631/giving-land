@props([
    'labelText' => '',
    'isRequired' => false
    ])
<div {{ $attributes->merge(['class' => 'div-form-input']) }}>
    <label class="texto-verde text-lg">
        <font @class(['text-red-600', 'hidden' => !$isRequired])>*</font> {{ $labelText }}
        {{-- <br> --}}
        <input class="w-full pt-2 pl-1 mb-1 text-base text-gray-900" value="{{old($attributes->get('name'))}}" {{ $attributes->whereDoesntStartWith('class') }}>
    </label>
    @error($attributes->get('name'))
        <p class="input-error text-red-500">* {{ $message }}</p>
    @enderror
    @if ($slot->hasActualContent())
        {{ $slot }}
    @endif
</div>
