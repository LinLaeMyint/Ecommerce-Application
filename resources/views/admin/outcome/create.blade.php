@extends('admin.layout.master')

@section('content')
    <h2>Create Outcome</h2>
    <div>
        <a href="{{route('outcome.index')}}" class="btn btn-dark">All Outcome List</a>
    </div>
    <hr>
    <form action="{{route('outcome.store')}}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="form-group">
            <label>Enter Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Enter Price</label>
            <input type="number" name="price" class="form-control">
        </div>
        <div class="form-group">
            <label>Enter Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <input type="submit" value="Create" class="btn btn-dark">
    </form>
@endsection
