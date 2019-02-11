@extends('layouts.layout')

@section('nav-menu')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 form-box">
                <h1 class="mb-5">Profile Settings</h1>

                @include('inc.messages')

                {!! Form::open(['route'=>'settingsUpdate', 'method'=>'POST']) !!}
        
                    {!! Form::token() !!}
                    {!! Form::hidden('_method', 'PATCH') !!}
                    
                    <div class="form-group">
                        {!! Form::label('name', 'Edit Name') !!}
                        {!! Form::text('name', $student->name, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'Edit Email') !!}
                        {!! Form::text('email', $student->email, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('gender', 'Edit Gender') !!}
                        {!! Form::select('gender', ['M' => 'Male', 'F' => 'Female'], $student->gender, ['placeholder' => 'Select Gender', 'class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('gpa', 'Edit GPA') !!}
                        {!! Form::number('gpa', $student->gpa, ['class'=>'form-control', 'min'=>'0', 'max'=>'100', 'step'=>'0.01']) !!}
                    </div>
            
                    <div class="text-center">
                        {!! Form::submit('Submit Changes', ['class'=>'btn btn-danger']) !!}
                    </div>
        
                {!! Form::close() !!}
                <div class="text-center">
                    <a class="btn btn-info mt-3" href="{{ route('homepage') }}">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection