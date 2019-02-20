@extends('layouts.admin')

@section('content-column')
    <div class="container right-container">
        <form method="POST" action="{{route('admin.colleges.update', ['college'=> $college->id])}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
    
            <div class="form-group">
                <label>College Name:</label>
                <input type="text" class="form-control" name="title" value="{{$college->college}}">
            </div>

            <div class="form-group">
                <label>Body</label>
                <textarea class="form-control" rows="6" name="desc">{{$college->desc}}</textarea>
            </div>

            {{-- <div class="form-group">
                <label>Category:</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                        @if($category->id == $post->category->id)
                            <option value="{{$category->id}}" selected>{{$category->title}}</option>
                        @else
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endif
                    @endforeach
                </select>
            </div> --}}

            <div class="form-group">
                <label>Add Image</label>
                <input type="file" name="image" accept="image/*">
                <p class="help-block">Image size should be 3/2</p>
            </div>
        
    
            <p class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </p>
        </form>
    </div>
@endsection