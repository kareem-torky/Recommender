@extends('layouts.layout')

@section('nav-menu')
    <ul class="navbar-nav mr-auto">
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
                <a class="dropdown-item" href="{{ back() }}">Log Out</a>
            </div>
        </li>
    </ul>
@endsection

@section('content')
    <div class="container admin-container">
        <div class="row">
            {{-- <div class="col-lg-3 sidebar">
                <div class="list-group text-center">
                    <a href="{{ route('admin.colleges.index') }}" class="list-group-item list-group-item-action">Colleges</a>
                    <a href="{{ route('admin.universities.index') }}" class="list-group-item list-group-item-action">Universities</a>
                    <a href="{{ route('admin.specialities.index') }}" class="list-group-item list-group-item-action">Specialities</a>
                </div>
            </div> --}}
            <div class="col-lg-12">
                @yield('content-column')
            </div>
        </div>
    </div>
@endsection