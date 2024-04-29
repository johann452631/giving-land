<div class = "div-form-input {{ $attributes->get('class') }}">
    <label class="texto-verde" for={{ $name }}><font class="text-red-600 {{ $hidden }}">*</font> {{ $labelText }}</label>
    <input {{ $attributes->whereDoesntStartWith('class') }} class="form-input w-full pt-2 pl-1 mb-1"
        type={{ $type }} name={{ $name }} value="{{ old($name) }}">
    @error($name)
        <p class="input-error text-red-500">* {{ $message }}</p>
    @enderror
    @if ($slot->hasActualContent())
        {{ $slot }}
    @endif
</div>
