@extends('admin.layout.master')

@section('content')
    <h2>Edit Category</h2>
    <div>
        <a href="{{route('category.index')}}" class="btn btn-dark">All Category</a>
    </div>
    <hr>
    <form action="{{route('category.update',$data->id)}}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Enter Name</label>
            <input type="text" name="name" class="form-control" value="{{$data->name}}">
        </div>
        <input type="submit" value="Update" class="btn btn-dark">
    </form>
@endsection
