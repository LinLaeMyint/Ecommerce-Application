@extends('admin.layout.master')

@section('content')
    <h2>All Category</h2>
    <div>
        <a href="{{route('category.create')}}" class="btn btn-dark">Create New Category</a>
    </div>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>En_Name</th>
                <th>MM_Name</th>
                <th>Image</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
            <tr>
                <td>{{$d->en_name}}</td>
                <td>{{$d->mm_name}}</td>
                <td>
                    <img src="{{asset('images/'.$d->image)}}" class="img-thumbnail" width="90" alt="{{$d->image}}">
                </td>
                <td>
                    <a href="{{route('category.edit',$d->id)}}" class="btn btn-primary">
                        <i class="fa fa-edit"></i>
                    </a>
                <form onsubmit="return confirm('Sure?')" action="{{route('category.destroy',$d->id)}}" method="POST" class="d-inline">
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
