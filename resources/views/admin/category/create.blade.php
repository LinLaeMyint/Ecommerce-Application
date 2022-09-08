@extends('admin.layout.master')

@section('content')
    <h2>Create Category</h2>
    <div>
        <a href="{{route('category.index')}}" class="btn btn-dark">All Category</a>
    </div>
    <hr>
    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="form-group">
            <label>Enter Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <input type="submit" value="Create" class="btn btn-dark">
    </form>
@endsection
