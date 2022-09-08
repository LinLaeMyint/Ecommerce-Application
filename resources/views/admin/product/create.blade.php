@extends('admin.layout.master')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div>
    <h3>Create Product</h3>
    <a href="{{route('product.index')}}" class="btn btn-dark">All Products</a>
</div>
<hr>
<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <h3>Product Info</h3>
                <div class="form-group">
                    <label for="">Enter Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Choose Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Enter Description</label>
                    <textarea name="description" id="description"></textarea>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Enter Buy Price</label>
                    <input type="number" class="form-control" name="buy_price">
                </div>
                <div class="form-group">
                    <label for="">Enter Sell Price</label>
                    <input type="number" class="form-control" name="sell_price">
                </div>
                <div class="form-group">
                    <label for="">Enter Discount Price</label>
                    <input type="number" class="form-control" name="discount_price">
                </div>
                <div class="form-group">
                    <label for="">Enter Total Quantity</label>
                    <input type="number" class="form-control" name="total_quantity">
                </div>
                <div class="form-group">
                    <label for="">Buy Description</label>
                    <textarea name="buy_description" class="form-control"></textarea>
                </div>
            </div>
        </div>

    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Choose Supplier</label>
                    <select name="supplier_id" id="supplier">
                        @foreach ($supplier as $d)
                            <option value="{{$d->id}}">{{$d->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Choose Brand</label>
                    <select name="brand_id" id="brand">
                        @foreach ($brand as $d)
                            <option value="{{$d->id}}">{{$d->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Choose Category</label>
                    <select name="category_id" id="category">
                        @foreach ($category as $d)
                            <option value="{{$d->id}}">{{$d->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Choose Color</label>
                    <select name="color_id[]" multiple id="color">
                        @foreach ($color as $d)
                            <option value="{{$d->id}}">{{$d->name}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" value="Create" class="btn btn-danger">
            </div>
        </div>
    </div>
</div>
</form>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function(){
            $('#description').summernote()
            $('#supplier').select2()
            $('#brand').select2()
            $('#category').select2()
            $('#color').select2()
        })
    </script>
@endsection
