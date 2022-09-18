<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAdd;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductAddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $purchase=ProductAdd::latest()->with('product','supplier')->paginate(2);
        return view('admin.product-add.index',compact('purchase'));
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
        $supplier=Supplier::all();
        return view('admin.product-add.create',compact('supplier','product_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'total_quantity'=>'required',
            'description'=>'required',
           ]);
       ProductAdd::create([
       'product_id'=>request()->pid,
       'supplier_id'=>request()->supplier_id,
       'total_quantity'=>request()->total_quantity,
       'description'=>request()->description,
       ]);

       Product::where('id',$request->pid)->update([
        'total_quantity'=> DB::raw('total_quantity+'.request()->total_quantity),
       ]);
       return redirect()->back()->with('success',request()->total_quantity.' Products Added Successfully');
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
