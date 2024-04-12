<div {{ $attributes->merge(['class' => 'alerta p-5 border-l-4 rounded-md']) }} id={{$attributes->get('id')}}>
    <p>{{$message}}</p>
</div>