@extends('admin.layout.master')

@section('content')
    <h2>Create Color</h2>
    <div>
        <a href="{{route('color.index')}}" class="btn btn-dark">All Color</a>
    </div>
    <hr>
    <form action="{{route('color.store')}}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="form-group">
            <label>Enter Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <input type="submit" value="Create" class="btn btn-dark">
    </form>
@endsection
