@extends('layouts.html')
@section('content')
    <form class="flex flex-col w-1/4" action={{ route('users.store') }} method="POST">
        @csrf
        <label for="name">nombre</label>
        <input type="text" name="name" value="{{old('name')}}">
        @error('name')
            {{ $message }}
        @enderror
        <label for="surname">apellido</label>

        <input type="text" name="surname" value={{ old('surname') }}>
        @error('surname')
            {{ $message }}
        @enderror
        <label for="birthday">fecha</label>

        <input type="date" name="birthday" value={{ old('birthday') }}>
        @error('birthday')
            {{ $message }}
        @enderror
        <label for="email">email</label>

        <input type="email" name="email" value={{ session('email') }} readonly>
        <label for="password">contraseña</label>

        <input type="password" name="password">
        @error('password')
            {{ $message }}
        @enderror
        <button type="submit">enviar</button>
    </form>
@endsection
