@extends('layouts.layout')

@section('nav-menu')
@endsection

@section('content')
    <div id="main-section" class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4">Colleges Recommender</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            
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


