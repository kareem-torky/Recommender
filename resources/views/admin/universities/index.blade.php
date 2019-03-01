@extends('layouts.admin')

@section('content-column')
    <div class="container">
            <h3 class="title-left mb-3">Universities</h3>
            <a class="btn btn-info button-right mb-3" href="{{ route('admin.universities.create') }}">Add</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">University</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1 ?>
                @foreach ($universities as $key => $university)
                    <tr>
                        <th scope="row">{{$universities->perPage()*($universities->currentPage()-1)+$count}}</th>
                        <td>{{ $university->name }}</td>
                        <td>
                            <form method="POST" action="{{route('admin.universities.destroy', ['university'=> $university->id])}}" style="display:inline" onclick="return confirm('Are you sure you want to delete?')">
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
            {{ $universities-> render() }}
        </div>
    </div>
@endsection