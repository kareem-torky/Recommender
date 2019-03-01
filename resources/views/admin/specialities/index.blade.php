@extends('layouts.admin')

@section('content-column')
    <div class="container">
        <h3 class="title-left mb-3">Specialities</h3>
        <a class="btn btn-info button-right mb-3" href="{{ route('admin.specialities.create') }}">Add</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Speciality</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1 ?>
                @foreach ($specialities as $key => $speciality)
                    <tr>
                        <th scope="row">{{$specialities->perPage()*($specialities->currentPage()-1)+$count}}</th>
                        <td>{{ $speciality->name }}</td>
                        <td>
                            <form method="POST" action="{{route('admin.specialities.destroy', ['speciality'=> $speciality->id])}}" style="display:inline" onclick="return confirm('Are you sure you want to delete?')">
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
        <div class="text-center">
            {!! $specialities->render() !!}
        </div>
    </div>
@endsection