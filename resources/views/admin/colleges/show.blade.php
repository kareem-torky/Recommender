@extends('layouts.admin')

@section('content-column')
    <div class="container right-container">
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
            <a class="btn btn-info" href="{{ url()->previous() }}">Back</a>
        </div>   
    </div>
@endsection