<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Color::orderBy('id','desc')->get();
        return view('admin.color.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.color.create');
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
           Color::create([
            'slug'=>uniqid().$request->name,
            'name'=>$request->name,
           ]);
           return redirect()->back()->with('success','Color Created Success');

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
        $data=Color::find($id);
        if(!$data){
            return redirect()->back()->with('error','Color Not Found');
        }
        return view('admin.color.edit',compact('data'));
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
           $data=Color::find($id);
           if(!$data){
            return redirect()->back()->with('error','Color Not Found');
        }
        Color::where('id',$id)->update([
            'name'=>$request->name,
          ]);
          return redirect()->back()->with('success','Color Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Color::find($id);
        Color::where('id',$id)->delete();
        return redirect()->back()->with('success','Color removed successfully');

    }
}
