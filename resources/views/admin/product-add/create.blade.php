@extends('admin.layout.master')

@section('content')
    <h2>Product Purchase [<b class="text-danger">{{$product_name}}</b>] </h2>
    <div>
        <a href="{{route('product-add.index')}}" class="btn btn-dark">All Transactions</a>
    </div>
    <hr>
    <form action="{{route('product-add.store').'?pid='.request()->pid}}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="form-group">
            <label>Choose Supplier</label>
            <select name="supplier_id" id="" class="form-control">
                @foreach ($supplier as $s)
                <option value="{{$s->id}}">{{$s->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Enter Quantity</label>
            <input type="number" name="total_quantity" class="form-control">
        </div>
        <div class="form-group">
            <label>Enter Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <input type="submit" value="Create" class="btn btn-dark">
    </form>
@endsection
