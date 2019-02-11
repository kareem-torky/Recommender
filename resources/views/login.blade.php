@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 form-box">
                {!! Form::open(['route'=>'login', 'method'=>'POST']) !!}
        
                    {!! Form::token() !!}
                    
                    <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email', '', ['class'=>'form-control']) !!}
                    </div>
            
                    <div class="form-group">
                        {!! Form::label('password', 'Password') !!}
                        {!! Form::password('password', ['class'=>'form-control']) !!}
                    </div>
            
                    <div class="text-center">
                        {!! Form::submit('Submit', ['class'=>'btn btn-lg btn-primary']) !!}
                    </div>
        
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection