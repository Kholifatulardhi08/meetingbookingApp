<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meals;
use App\Http\Requests\MealStoreRequest;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $meals = Meals::all();
        if ($request->has('search')) {
            $meals = Meals::where('name', 'like', "%{$request->search}%")->get();
        }

        return view('meals.index', compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MealStoreRequest $request)
    {
        Meals::create($request->validated());

        return redirect()->route('meals.index')->with('message', 'meals Created Successfully');
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
    public function edit(Meals $meals, $id)
    {
        $meals = Meals::find($id);
        return view('meals.edit', compact('meals'));
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
        $meals = Meals::find($id);
        $meals->name = $request->name;
        $meals->qty = $request->qty;
        $meals->update();
        return redirect()->route('meals.index')->with('message','Meals Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meals $meals, $id)
    {
        $meals = Meals::find($id);
        $meals->delete();
        return redirect()->route('meals.index')->with('message','Meals Deleted Successfully');
    }
}
