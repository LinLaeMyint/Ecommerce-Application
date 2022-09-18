@extends('admin.layout.master')

@section('content')
    <h2>All Income List</h2>
    <div>
        <a href="{{route('income.create')}}" class="btn btn-dark">Create New Income</a>
    </div>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Price</th>
                <th>Description</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($income as $d)
            <tr>
                <td>{{$d->title}}</td>
                <td><b class="badge badge-success">{{$d->price}}ks</b></td>
                <td>{{$d->description}}</td>
                <td>
                    <a href="{{route('income.edit',$d->id)}}" class="btn btn-primary">
                        <i class="fa fa-edit"></i>
                    </a>
                <form onsubmit="return confirm('Sure?')" action="{{route('income.destroy',$d->id)}}" method="POST" class="d-inline">
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
    {{$income->links()}}
@endsection
