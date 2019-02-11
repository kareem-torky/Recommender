@if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endforeach
@endif

@if(session('error') != null)
 <h5 class="alert alert-danger">{{session('error')}}</h5> 
@endif