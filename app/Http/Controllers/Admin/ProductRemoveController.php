<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductRemove;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductRemoveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $remove=ProductRemove::latest()->with('product')->paginate(2);
        return view('admin.product-remove.index',compact('remove'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product=Product::find(request()->pid);
        if(!$product){
            return redirect()->back()->with('error','Product Not Found');
        }
        $product_name=$product->name;
        return view('admin.product-remove.create',compact('product_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductRemove::create([
            'product_id'=>request()->pid,
            'total_quantity'=>request()->total_quantity,
            'description'=>request()->description,
        ]);
        Product::where('id',request()->pid)->update([
            'total_quantity'=>DB::raw('total_quantity-'.request()->total_quantity),
        ]);
        return redirect()->back()->with('success',request()->total_quantity. ' Products Cancel Completed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
