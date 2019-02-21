@extends('layouts.layout')

@section('nav-menu')
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle light-text" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ auth('student')->user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('settings') }}">Settings</a>
                <a class="dropdown-item" href="{{ route('logout') }}">Log Out</a>
            </div>
        </li>
    </ul>
@endsection

@section('content')
    <div id="sections-container" class="container">
        <h4 class="text-center top-title">{{ $college->university }}, Faculty of {{ $college->college }}</h4>
        <div class="row">
                <div class="col-lg-5">
                    <img src="{{ get_image($college->image) }}" width="100%">
                </div>
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">
                                <b>Speciality:</b> {{ $college->speciality }} <hr>
                                <b>Description:</b> {{ $college->desc }} <hr>
                                <b>GPA:</b> {{ $college->gpa }} <hr>
                                <b>Price:</b> {{ $college->price }} <hr>
                                <b>Rating:</b> {{ $college->rating }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>   
            <div class="text-center mt-5">
                <a class="btn btn-info" href="{{ route('homepage') }}">Back</a>
            </div>
        </div>   
    </div>
@endsection