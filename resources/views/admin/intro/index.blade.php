@extends('layouts.admin')

@section('content-column')
    <div class="container">
        <h3 class="mb-3">Intro</h3>

        <form method="POST" action="{{ route('admin.intro.update') }}">
            @csrf
            @method('PATCH')
    
            <div class="form-group">
                <label>Title:</label>
                <input type="text" class="form-control" name="title" value="{{ $intro->title }}">
            </div>

            <div class="form-group">
                <label>Section One:</label>
                <textarea class="form-control" rows="6" name="section1">{{ $intro->section1 }}</textarea>
            </div>

            <div class="form-group">
                <label>Section Two:</label>
                <textarea class="form-control" rows="6" name="section2">{{ $intro->section2 }}</textarea>
            </div>
        
            <p class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </p>
        </form>
    </div>
@endsection