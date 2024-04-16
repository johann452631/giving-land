@extends('layouts.html')
@section('content')
    @pushOnce('links')
        <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    @endPushOnce
    <x-navigation-header/>
    <div class="flex px-24 w-full mt-16">
        <div class="flex justify-between">
            @if ($user->profile_img == null)
                <img class="profile-img" src="{{ asset('appicons\user-solid.svg') }}" alt="">
            @else
                <img src="{{$user->profile_img}}" alt="" class="profile-img">
            @endif
            <h1>{{$user->name}}</h1>
        </div>
    </div>
@endsection
