@extends('layouts.html')
@section('content')
    @pushOnce('links')
        <link rel="stylesheet" href="{{ asset('css/user-index.css') }}">
    @endPushOnce
    <x-navigation-header />
    
    <x-footer/>
@endsection
