@extends('admin.layout.master')

@section('content')
    <h2>All Color</h2>
    <div>
        <a href="{{route('color.create')}}" class="btn btn-dark">Create New Color</a>
    </div>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
            <tr>
                <td>{{$d->name}}</td>
                <td>
                    <a href="{{route('color.edit',$d->id)}}" class="btn btn-primary">
                        <i class="fa fa-edit"></i>
                    </a>
                <form onsubmit="return confirm('Sure?')" action="{{route('color.destroy',$d->id)}}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
@endsection
