@extends('layouts.layout')

@section('nav-menu')
@endsection

@section('content')
    <div id="main-section" class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4">{{ $intro->title }}</h1>
            <p class="lead">{{ $intro->section1 }}</p>
            <hr class="my-4">
            <p>{{ $intro->section2 }}</p>
            
            @auth('student')
                <a class="btn btn-primary btn-lg" href="{{ route('homepage') }}" role="button">Back to Homepage</a>
            @endauth
            
            @guest('student')
                <a class="btn btn-primary btn-lg" href="{{ route('signup') }}" role="button">Sign Up</a>
                <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Log In</a>
            @endguest
        </div>
    </div>
@endsection


