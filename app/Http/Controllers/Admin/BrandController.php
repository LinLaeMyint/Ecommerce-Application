<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Brand::orderBy('id','desc')->get();
        return view('admin.brand.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');

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
            'name'=>'required',

           ]);

           Brand::create([
            'slug'=>uniqid().$request->name,
            'name'=>$request->name,
           ]);
           return redirect()->back()->with('success','Brand Created Success');

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
        $data=Brand::find($id);
        if(!$data){
            return redirect()->back()->with('error','Brand Not Found');
        }
        return view('admin.brand.edit',compact('data'));
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
        $request->validate([
            'name'=>'required',
           ]);
           $data=Brand::find($id);
           if(!$data){
            return redirect()->back()->with('error','Brand Not Found');
        }
        Brand::where('id',$id)->update([
            'name'=>$request->name,
          ]);
          return redirect()->back()->with('success','Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Brand::find($id);
        Brand::where('id',$id)->delete();
        return redirect()->back()->with('success','Brand removed successfully');

    }
}
