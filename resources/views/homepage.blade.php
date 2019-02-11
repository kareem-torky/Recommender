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
                <table class="table table-condensed">
                    <thead>
                        <tr>
                        <th scope="col"></th>
                        <th scope="col">College</th>
                        <th scope="col">University</th>
                        <th scope="col">GPA</th>
                        <th scope="col">Pricing</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>College</td>
                            <td>University</td>
                            <td>GPA</td>
                            <td>Pricing</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>College</td>
                            <td>University</td>
                            <td>GPA</td>
                            <td>Pricing</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>College</td>
                            <td>University</td>
                            <td>GPA</td>
                            <td>Pricing</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>College</td>
                            <td>University</td>
                            <td>GPA</td>
                            <td>Pricing</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>College</td>
                            <td>University</td>
                            <td>GPA</td>
                            <td>Pricing</td>
                        </tr>
                    </tbody>
                </table>
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