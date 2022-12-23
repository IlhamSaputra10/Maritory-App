@extends('layouts.main')

@section('content')
    <h1>Home</h1>
    
    <h3>Hello @auth {{ auth()->user()->nama }} @else world @endauth</h3>
    @auth
    <p>Email : {{ auth()->user()->email }}</p>
    <p>No HP : {{ auth()->user()->noHP }}</p>
    @else
    @endauth
@endsection