@extends('admin.layout.master')

@section('content')
    <h2>Edit Outcome</h2>
    <div>
        <a href="{{route('outcome.index')}}" class="btn btn-dark">All Outcome List</a>
    </div>
    <hr>
    <form action="{{route('outcome.update',$outcome->id)}}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Enter Title</label>
            <input type="text" name="title" class="form-control" value="{{$outcome->title}}">
        </div>
        <div class="form-group">
            <label>Enter Price</label>
            <input type="number" name="price" class="form-control" value="{{$outcome->price}}">
        </div>
        <div class="form-group">
            <label>Enter Description</label>
            <input type="text" name="description" class="form-control" value="{{$outcome->description}}">
        </div>
        <input type="submit" value="Update" class="btn btn-dark">
    </form>
@endsection
