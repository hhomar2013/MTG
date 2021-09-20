<?php

namespace App\Http\Controllers;

use App\Models\college;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $college = college::all();
        return view('college.college' ,compact('college'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        college::create([
           'c_name'=>$request->c_name,
           'info'=>$request->info

        ]);
        session()->flash('Add');
        return redirect()->route('college.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\college  $college
     * @return \Illuminate\Http\Response
     */
    public function show(college $college)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\college  $college
     * @return \Illuminate\Http\Response
     */
    public function edit(college $college)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\college  $college
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $college = college::findOrFail($request->id);
        $college->update([
            'c_name'=>$request->c_name,
            'info'=>$request->info

        ]);
        session()->flash('Edit');
        return redirect()->route('college.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\college  $college
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $college = college::findOrFail($request->id);
        $college->delete();
        session()->flash('Delete');
        return redirect()->route('college.index');
    }
}
