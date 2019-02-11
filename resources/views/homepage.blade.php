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
        <div class="row">
            <div id="list-section" class="col-lg-8">
                <h3 class="mb-3">Recommended Colleges:</h3>
                @if(count($colleges) > 0)
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                            <th scope="col"></th>
                            <th scope="col">College</th>
                            <th scope="col">University</th>
                            <th scope="col">Gender</th>
                            <th scope="col">GPA</th>
                            <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colleges as $key => $college)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $college->college }}</td>
                                    <td>{{ $college->university }}</td>
                                    <td>{{ $college->gender }}</td>
                                    <td>{{ $college->gpa }}</td>
                                    <td>{{ $college->price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else 
                    <p>Select speciality and max. price to show list</p>
                @endif
            </div>
            <div id="sidebar" class="col-lg-4">
                <form action="{{ route('viewList') }}" method="POST">
                    @csrf 

                    <div class="form-group">
                        <label>Select Specitality</label>
                        <select name="speciality" class="custom-select">
                            @foreach ($specialities as $speciality)
                                <option value="{{ $speciality->name }}">{{ $speciality->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Select max. Pricing</label>
                        <input type="numeric" name="price" class="form-control">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">View List</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection