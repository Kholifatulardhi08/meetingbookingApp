<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RoomStoreRequest;
use App\Models\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rooms = Room::all();
        if ($request->has('search')) {
            $rooms = Room::where('name', 'like', "%{$request->search}%")->orWhere('code', 'like', "%{$request->search}%")->get();
        }

        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomStoreRequest $request, Room $rooms)
    {
        Room::create($request->validated());

        return redirect()->route('rooms.index')->with('message', 'Country Created Successfully');
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
    public function edit(Room $rooms, $id)
    {
        $rooms = Room::find($id);
        return view('rooms.edit', compact('rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $rooms, $id)
    {
        $rooms = Room::find($id);
        $rooms->name = $request->input('name');
        $rooms->code = $request->input('code');
        $rooms->update();
        return redirect()->route('rooms.index')->with('message','Room Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room, $id)
    {
        $rooms = Room::find($id);
        $rooms->delete();
        return redirect()->route('rooms.index')->with('message','Room Deleted Successfully');
    }
}
