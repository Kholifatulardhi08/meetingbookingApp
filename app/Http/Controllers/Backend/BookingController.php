<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BookingStoreRequest;
use App\Models\Booking;
use App\Models\User;
use App\Models\Room;
use App\Models\Instance;



class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request, Booking $bookings)
    {
        $bookings = Booking::all();
        if($request->has('search')){
            $bookings = Booking::where('name', 'like', "%{$request->search}%")->orWhere('snack', 'like', "%{$request->search}%")->get();
        }
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Booking $bookings, User $users, Instance $instances, Room $rooms)
    {
        $bookings = Booking::all(['user_id','room_id', 'instance_id']);
        return view('bookings.create', compact('bookings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingStoreRequest $request)
    {
        Booking::create([
            'name' => $request->name,
            'snack' => $request->snack,
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
            'instance_id' => $request->instance_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return redirect()->route('bookings.index')->with('message', 'booking created Succsesfully!');
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
    public function edit(Booking $bookings, $id)
    {
        $bookings = Booking::find($id);
        return view('bookings.edit', compact('bookings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Booking $bookings, Request $request, $id)
    {
        $bookings = Booking::find($id);
        $bookings->name = $request->name;
        $bookings->snack = $request->snack;
        $bookings->user_id = $request->user_id;
        $bookings->room_id = $request->room_id;
        $bookings->instance_id = $request->instance_id;
        $bookings->start_date = $request->start_date;
        $bookings->end_date = $request->end_date;
        $bookings->update();
        return redirect()->route('bookings.index')->with('message','Booking Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Booking $bookings ,$id)
    {
        $bookings = Booking::find($id);
        $bookings->delete();
        return redirect()->route('bookings.index')->with('message','Booking Deleted Successfully');
    }
}
