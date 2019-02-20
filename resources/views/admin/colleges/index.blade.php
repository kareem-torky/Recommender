@extends('layouts.admin')

@section('content-column')
    <div class="container right-container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">University</th>
                    <th scope="col">College</th>
                    <th scope="col">Speciality</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colleges as $college)
                    <tr>
                        <th scope="row">{{ $college->id }}</th>
                        <td>{{ $college->university }}</td>
                        <td>{{ $college->college }}</td>
                        <td>{{ $college->speciality }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('admin.colleges.show', ['college'=>$college->id]) }}"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-primary" href="{{route('admin.colleges.edit', ['college'=> $college->id])}}"><i class="fas fa-pen"></i></a>
                            <form method="POST" action="{{route('admin.colleges.destroy', ['college'=> $college->id])}}" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {!! $colleges->render() !!}
        </div>
    </div>
@endsection