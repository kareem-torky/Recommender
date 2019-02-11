@extends('layouts.layout')

@section('nav-menu')
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle light-text" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ auth('student')->user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Settings</a>
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
                <form>
                    <div class="form-group">
                        <select class="custom-select">
                            <option selected>Change Speciality</option>
                            <option value="1">Medical</option>
                            <option value="2">Engineering</option>
                            <option value="3">Agriculture</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Change Pricing</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection