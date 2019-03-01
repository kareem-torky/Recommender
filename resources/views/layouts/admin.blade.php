@extends('layouts.layout')

@section('nav-menu')
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link light-text" href="{{ route('admin.intro.index') }}">Intro</a>
        </li>
        <li class="nav-item">
          <a class="nav-link light-text" href="{{ route('admin.colleges.index') }}">Colleges</a>
        </li>
        <li class="nav-item">
          <a class="nav-link light-text" href="{{ route('admin.universities.index') }}">Universities</a>
        </li>
        <li class="nav-item">
          <a class="nav-link light-text" href="{{ route('admin.specialities.index') }}">Specialities</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle light-text" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ auth('admin')->user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('admin.logout') }}">Log Out</a>
            </div>
        </li>
    </ul>
@endsection

@section('content')
    <div class="container admin-container">
        <div class="row">
            <div class="col-lg-12">
                @yield('content-column')
            </div>
        </div>
    </div>
@endsection