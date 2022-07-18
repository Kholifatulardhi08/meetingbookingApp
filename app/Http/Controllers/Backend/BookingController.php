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

    public function index(Request $request, Booking $bookings, User $users)
    {
        $bookings = Booking::all();
        if($request->has('search')){
            $bookings = Booking::where('name', 'like', "%{$request->search}%")->orWhere('user_id', 'like', "%{$request->search}%")->get();
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
