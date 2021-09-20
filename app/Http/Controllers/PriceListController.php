<?php

namespace App\Http\Controllers;

use App\Models\price_list;
use Illuminate\Http\Request;

class PriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricelist = price_list::all();
        return view('pricelist.pricelist',compact('pricelist'));
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
        price_list::create([
            'c_name'=>$request->c_name,
'count'=>$request->count,
'price'=>$request->price,
'statue'=>$request->statue,
        ]);

        session()->flash('Add');
        return redirect()->route('pricelist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\price_list  $price_list
     * @return \Illuminate\Http\Response
     */
    public function show(price_list $price_list)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\price_list  $price_list
     * @return \Illuminate\Http\Response
     */
    public function edit(price_list $price_list)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\price_list  $price_list
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $price_list = price_list::findOrFail($request->id);
        $price_list->update([
            'c_name'=>$request->c_name,
            'price'=>$request->price,
            'statue'=>$request->statue,
        ]);
        session()->flash('Edit');
        return redirect()->route('pricelist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\price_list  $price_list
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $price_list = price_list::findOrFail($request->id);
        $price_list->delete();
        session()->flash('Delete');
        return redirect()->route('pricelist.index');
    }
}
