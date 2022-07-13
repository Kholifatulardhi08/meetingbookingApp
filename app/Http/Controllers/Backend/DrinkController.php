<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drink;
use App\Http\Requests\DrinkStoreRequest;


class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $drinks = Drink::all();
        if ($request->has('search')) {
            $drinks = Drink::where('name', 'like', "%{$request->search}%")->get();
        }

        return view('drinks.index', compact('drinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drinks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DrinkStoreRequest $request)
    {
        Drink::create($request->validated());

        return redirect()->route('drinks.index')->with('message', 'Drinks Created Successfully');
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
    public function edit(Drink $drinks, $id)
    {
        $drinks = Drink::find($id);
        return view('drinks.edit', compact('drinks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Drink $drinks, Request $request, $id )
    {
        $drinks = Drink::find($id);
        $drinks->name = $request->name;
        $drinks->qty = $request->qty;
        $drinks->update();
        return redirect()->route('drinks.index')->with('message','Drink Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drink $drinks, $id)
    {
        $drinks = Drink::find($id);
        $drinks->delete();
        return redirect()->route('drinks.index')->with('message','Drink Deleted Successfully');
    }
}
