@extends('layouts.admin')

@section('content-column')
    <div class="container right-container">
        <h3 class="text-center">Add University</h3>

        @include('inc.messages')

        <form method="POST" action="{{ route('admin.universities.store') }}">
            @csrf
    
            <div class="form-group">
                <label>University Name:</label>
                <input type="text" class="form-control" name="name">
            </div>
        
            <p class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </p>
        </form>
    </div>
@endsection