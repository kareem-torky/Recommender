@extends('layouts.admin')

@section('content-column')
    <div class="container right-container">
        <h3 class="text-center">Add College</h3>

        @include('inc.messages')

        <form method="POST" action="{{ route('admin.colleges.store') }}" enctype="multipart/form-data">
            @csrf
    
            <div class="form-group">
                <label>College Name:</label>
                <input type="text" class="form-control" name="college">
            </div>

            <div class="form-group">
                <label>University:</label>
                <select name="university" class="form-control">
                    @foreach ($universities as $university)
                        <option value="{{$university->name}}">{{$university->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Speciality:</label>
                <select name="speciality" class="form-control">
                    @foreach ($specialities as $speciality)
                        <option value="{{$speciality->name}}">{{$speciality->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Description:</label>
                <textarea class="form-control" rows="6" name="desc"></textarea>
            </div>

            <div class="form-group">
                <label>Gender:</label>
                <select name="gender" class="form-control">
                    <option value="Boys">Boys</option>
                    <option value="Girls">Girls</option>
                    <option value="Both">Both</option>
                </select>
            </div>

            <div class="form-group">
                <label>GPA:</label>
                <input type="numeric" class="form-control" name="gpa" min="0" max="100" step="0.01">
            </div>

            <div class="form-group">
                <label>Price:</label>
                <input type="numeric" class="form-control" name="price">
            </div>

            <div class="form-group">
                <label>Rating:</label>
                <input type="numeric" class="form-control" name="rating">
            </div>
            
            <div class="form-group">
                <label>Add Image</label>
                <input type="file" name="image" accept="image/*">
                <p class="help-block">Image size should be 4/3 ratio</p>
            </div>
        
            <p class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </p>
        </form>
        <div class="text-center">
            <a class="btn btn-info" href="{{ url()->previous() }}">Back</a>
        </div> 
    </div>
@endsection