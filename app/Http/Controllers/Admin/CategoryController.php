<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Category::orderBy('id','desc')->get();
        return view('admin.category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'en_name'=>'required',
            'mm_name'=>'required',
            'image'=>'required'
           ]);
            //image uploaded requested
       $file=$request->file('image');
       $file_name=uniqid().$file->getClientOriginalName();
       $file->move(public_path('images'),$file_name);
           Category::create([
            'slug'=>uniqid().$request->en_name,
            'en_name'=>$request->en_name,
            'mm_name'=>$request->mm_name,
            'image'=>$file_name
           ]);
           return redirect()->back()->with('success','Category Created Success');

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
        $data=Category::find($id);
        if(!$data){
            return redirect()->back()->with('error','Category Not Found');
        }
        return view('admin.category.edit',compact('data'));
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
            'en_name'=>'required',
            'mm_name'=>'required',
           ]);

           $data=Category::find($id);
           if(!$data){
            return redirect()->back()->with('error','Category Not Found');
        }
        $file=$request->file('image');
        if($file){
         File::delete(public_path('/images').'/'.$data->image);
             //image uploaded requested
             $file=$request->file('image');
             $file_name=uniqid().$file->getClientOriginalName();
             $file->move(public_path('images'),$file_name);
        }else{
         $file_name=$data->image;
        }

        Category::where('id',$id)->update([
            'en_name'=>$request->en_name,
            'mm_name'=>$request->mm_name,
            'image'=>$file_name
          ]);
          return redirect()->back()->with('success','Category Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Category::find($id);
        File::delete(public_path('/images').'/'.$data->image);
        Category::where('id',$id)->delete();
        return redirect()->back()->with('success','Category removed successfully');

    }
}
