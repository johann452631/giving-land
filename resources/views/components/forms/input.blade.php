<div class = "div-form-input {{ $attributes->get('class') }}">
    <span class="text-red-500 {{ $hidden }}">*</span>
    <label class="texto-verde" for={{ $name }}>{{ $labelText }}</label>
    <input {{ $attributes->whereDoesntStartWith('class') }} class="form-input w-full pt-2 pl-1 mb-1"
        type={{ $type }} name={{ $name }} value="{{ old($name) }}">
    @error($name)
        <span class="text-red-500">* {{ $message }}</span>
    @enderror
    @if ($slot->hasActualContent())
        {{ $slot }}
    @endif
</div>
