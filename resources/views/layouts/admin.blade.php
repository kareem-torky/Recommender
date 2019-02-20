@extends('layouts.layout')

@section('nav-menu')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 sidebar">
                <div class="list-group text-center">
                    <a href="{{ route('admin.colleges.index') }}" class="list-group-item list-group-item-action">Colleges</a>
                    <a href="#" class="list-group-item list-group-item-action">Students</a>
                    <a href="#" class="list-group-item list-group-item-action">A simple secondary list group item</a>
                    <a href="#" class="list-group-item list-group-item-action">A simple success list group item</a>
                    <a href="#" class="list-group-item list-group-item-action">A simple danger list group item</a>
                    <a href="#" class="list-group-item list-group-item-action">A simple warning list group item</a>
                    <a href="#" class="list-group-item list-group-item-action">A simple info list group item</a>
                    <a href="#" class="list-group-item list-group-item-action">A simple light list group item</a>
                    <a href="#" class="list-group-item list-group-item-action">A simple dark list group item</a>
                </div>
            </div>
            <div class="col-lg-8">
                @yield('content-column')
            </div>
        </div>
    </div>
@endsection