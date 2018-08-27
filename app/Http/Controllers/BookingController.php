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
        return view('bookings.create',compact('room'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Room $room)
    {     
        
        $this->validate(request(),['name'=>'required','description'=>'required','startDate'=>'required','endDate'=>'required']);
        
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

        //redirect to show_all page
        // return redirect()->route('rooms');
        // return redirect(action('RoomsController@index'),compact('room'));
        // return Route('/rooms/'.$room->id);
        return redirect()->route('room.show', ['room' => $room->id]);
        // route('name.route', ['room' => $room->id]) }}
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
        return view('bookings.show',compact('bookings'));
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
