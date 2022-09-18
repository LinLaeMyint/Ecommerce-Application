<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Outcome;
use Illuminate\Http\Request;

class OutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outcome=Outcome::latest()->paginate(2);
        return view('admin.outcome.index',compact('outcome'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.outcome.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Outcome::create([
            'title'=>request()->title,
            'price'=>request()->price,
            'description'=>request()->description,
        ]);
        return redirect()->back()->with('success','Outcome Stored');
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
        $outcome=Outcome::find($id);
        if(!$outcome){
            return redirect()->back()->with('error','Data Not Found');
        }
        return view('admin.outcome.edit',compact('outcome'));
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
           $outcome=Outcome::find($id);
           if(!$outcome){
            return redirect()->back()->with('error','Outcome Not Found');
        }
        Outcome::where('id',$id)->update([
            'title'=>$request->title,
            'price'=>$request->price,
            'description'=>$request->description,
          ]);
          return redirect()->back()->with('success','Outcome Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Outcome::where('id',$id)->delete();
        return redirect()->back()->with('success','Outcome Removed');
    }
}
