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
            <label>Enter English Name</label>
            <input type="text" name="en_name" class="form-control" value="{{$data->en_name}}">
        </div>
        <div class="form-group">
            <label>Enter Myanmar Name</label>
            <input type="text" name="mm_name" class="form-control" value="{{$data->mm_name}}">
        </div>
        <div class="form-group">
            <label>Choose Image</label>
            <input type="file" name="image" class="form-control">
            <img src="{{asset('/images/'.$data->image)}}" width="200" class="img-thumbnail" alt="">
        </div>
        <input type="submit" value="Update" class="btn btn-dark">
    </form>
@endsection
