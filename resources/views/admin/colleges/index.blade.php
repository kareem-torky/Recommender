@extends('layouts.admin')

@section('content-column')
    <div class="container">
        <h3 class="title-left mb-3">Colleges</h3>
        <a class="btn btn-info button-right mb-3" href="{{ route('admin.colleges.create') }}">Add</a>
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
                <?php $count = 1 ?>
                @foreach ($colleges as $key => $college)
                    <tr>
                        <th scope="row">{{$colleges->perPage()*($colleges->currentPage()-1)+$count}}</th>
                        <td>{{ $college->university }}</td>
                        <td>{{ $college->college }}</td>
                        <td>{{ $college->speciality }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('admin.colleges.show', ['college'=>$college->id]) }}"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-primary" href="{{route('admin.colleges.edit', ['college'=> $college->id])}}"><i class="fas fa-pen"></i></a>
                            <form method="POST" action="{{route('admin.colleges.destroy', ['college'=> $college->id])}}" style="display:inline" onclick="return confirm('Are you sure you want to delete?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php $count += 1 ?>
                @endforeach
            </tbody>
        </table>

        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="text-center">
                    {!! $colleges->render() !!}
                </div>
            </div>
        </div>
        
    </div>
@endsection