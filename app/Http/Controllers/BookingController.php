<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\User;
use App\Booking;
use Illuminate\Support\Facades\Input;
use Auth;
use Carbon\Carbon;
use Symfony\Component\Routing\Route;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Room $room)
    {            
        // dd($room);
        return view('bookings.create',compact('room'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Room $room)
    {     
        $this->validate(request(),['name'=>'required','description'=>'required','start_date'=>'required|date|after:now','end_date'=>'required|date|after:now','image'=>'required','link'=>'required']);
        
        $old_bookings = Booking::all();
        foreach($old_bookings as $old_booking)
        {
        if($room->id===$old_booking->room->id){
        $old_start = $old_booking->start_date;
        $old_end = $old_booking->end_date;
        $proposed_start = request('start_date');
            if($proposed_start>$old_start){
                $this->validate(request(),['start_date' => "after:$old_end"]);
                // dd($proposed_start,$old_start,"after start");
            }
            if($proposed_start<$old_end){
                $this->validate(request(),['start_date' => "after:$old_end"]);
                dd($proposed_start,$old_end,"before end");
            }
            
        }}


        $book = new Booking();
        $book->name = request('name');
        $book->description = request('description');
        $book->user_id = auth()->id();
        $book->room_id = $room->id;
        $book->start_date = Carbon::parse(request('startDate'));         
        $book->end_date = Carbon::parse(request('endDate'));
        $book->link = request('link'); 
        if(Input::hasFile('image')){
            $file = Input::file('image');
            $book->image = $file->getClientOriginalName();
            $file->move('img\books', $file->getClientOriginalName());
        }
        $book->save();

        return redirect()->route('room.show', ['room' => $room->id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking) 
    {

        return view('bookings.show',compact('booking'));
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
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return back();
    }
}
