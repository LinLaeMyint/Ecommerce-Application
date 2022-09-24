@extends('admin.layout.master')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Your Order List</h1>
        <a href="{{url('/admin/order?status=success')}}" class="btn btn-sm btn-success">Success</a>
        <a href="{{url('/admin/order?status=pending')}}" class="btn btn-sm btn-warning">Pending</a>
        <a href="{{url('/admin/order?status=reject')}}" class="btn btn-sm btn-danger">Reject</a> |
        <a href="{{url('/admin/order')}}" class="btn btn-sm btn-primary">All</a>

    </div>
    <div class="card-body">
        <table class="table table-striped mt-2">
           <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Deli Info</th>
                <th>Status</th>
                <th>Options</th>
            </tr>
           </thead>
           <tbody>
                @foreach ($order as $o)
                <tr>
                    <td><img src="{{$o->product->image_url}}" width="70px" class="img-thumbnail" alt=""></td>
                    <td>{{$o->product->name}}</td>
                    <td>{{$o->total_quantity}}</td>
                    <td>
                        <table class="border border-dark">
                            <tr>
                                <td>Payment</td>
                                <td>Phone</td>
                                <td>Address</td>
                            </tr>
                            <tr>
                                <td>{{$o->payment}}</td>
                                <td>{{$o->address}}</td>
                                <td>{{$o->phone}}</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <?php
                            $status='';
                            if($o->status=='success'){
                                $status="success";
                            }
                            if($o->status=='reject'){
                                $status="danger";
                            }
                            if($o->status=='pending'){
                                $status="warning";
                            }
                         ?>
                            <span class="badge badge-{{$status}}">{{$o->status}}</span>





                    </td>
                    <td>
                        <a href="{{url('/admin/change-order-status/success?id='.$o->id)}}" class="btn btn-sm btn-success">Success</a>
                        <a href="{{url('/admin/change-order-status/reject?id='.$o->id)}}" class="btn btn-sm btn-danger">Reject</a>
                    </td>
                </tr>
                @endforeach

           </tbody>
        </table>
    </div>
</div>
{{$order->links()}}
@endsection
