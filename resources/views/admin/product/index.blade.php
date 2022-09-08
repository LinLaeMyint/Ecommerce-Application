@extends('admin.layout.master')

@section('content')
    <h2>All Product</h2>
    <div>
        <a href="{{route('product.create')}}" class="btn btn-dark">Create New Product</a>
    </div>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Remain Quantity</th>
                <th>Sell Price</th>
                <th>Buy Price</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $d)
                <tr>
                    <td>{{$d->name}}</td>
                    <td><img src="{{asset('images/'.$d->image)}}" width="50" alt="" class="img-thumbnail"></td>
                    <td>{{$d->total_quantity}}</td>
                    <td>{{$d->sell_price}}</td>
                    <td>{{$d->buy_price}}</td>
                    <td>
                        <a href="{{route('product.edit',$d->id)}}" class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                        </a>
                    <form onsubmit="return confirm('Sure?')" action="{{route('product.destroy',$d->id)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                        |
                        <a href="" class="btn btn-outline-success">Add Product</a>
                        <a href="" class="btn btn-outline-danger">Remove Product</a>
                    </form>

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{$product->links()}} <!--pagination bar -!>
@endsection
