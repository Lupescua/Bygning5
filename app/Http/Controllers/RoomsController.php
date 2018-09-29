<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use Illuminate\Support\Facades\Input as Input;
use App\Http\Controllers\Controller;

use App\Booking;
use Calendar;

class RoomsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }

    public function index() 
    {
        $booking = Booking::all();
        if($booking->count()) {
            foreach ($booking as $key => $value) {
                $events[] = Calendar::event(
                    $value->name,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
	                [
                        'color' => '#f05050',
                        // somehow show the adress of the event
	                    'url' => "/bookings/".$value->id,
	                ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);

        $rooms = Room::orderby('name','asc')->get();
   
        return view('rooms.index',compact('calendar','rooms'));
    }
    
    // On the Room page
    public function show(Room $room) 
    {
        
        $bookings = Booking::where('room_id', $room->id)->orderByDesc('start_date')->get();
        
        if($bookings->count()) {
            foreach ($bookings as $key => $value) {
                $events[] = Calendar::event(
                    $value->name,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
	                [
	                    'color' => '#f05050',
                        'url' => '#'.$value->id,
                        
	                ]
                );
            }
       
        $calendar = Calendar::addEvents($events);
            return view('rooms.show',compact('room','bookings','calendar'));
        }else{
            return view('rooms.show',compact('room'));
        }
    }
    
    public function create()
    {
       return view('rooms.create');

    }

    public function store()
    {
        $this->validate(request(),['name'=>'required','description'=>'required','floor_nr'=>'required','adress'=>'required','image'=>'required','bookable'=>'required']);
    
        $room = new Room();
        $room->name = request('name');
        $room->description = request('description');
        $room->floor_nr = request('floor_nr');
        $room->adress = request('adress');
        if (request('bookable') === 'on'){
        $room->bookable = 1;
        }else{
        $room->bookable = 0;
        }                
        if(Input::hasFile('image')){
            $file = Input::file('image');
            $room->image = $file->getClientOriginalName();
            $file->move('img\rooms', $file->getClientOriginalName());
        }
        $room->save();

        //redirect to show_all page
        return redirect(action('RoomsController@index'));
       
    }

    public function admin_show(Room $room) 
    {
        return view('rooms.update',compact('room'));
    }

    public function update(Room $room, Request $request)
    {   
        // dd($request->bookable,"I am at the begining of update");
        $room->name = request('name');
        $room->description = request('description');
        $room->floor_nr = request('floor_nr');
        $room->adress = request('adress');
        if ($request->bookable === "1"){
            $room->bookable = 1;
            // dd($room->bookable);
        }else{
            $room->bookable = 0;
            // dd($room->bookable);
        }                
        if(Input::hasFile('image')){
            $file = Input::file('image');
            $room->image = $file->getClientOriginalName();
            $file->move('img\rooms', $file->getClientOriginalName());
        }
        $room->save();
            dd($room->bookable,'finish');

        return redirect(action('RoomsController@index'));  
        
    }

    public function destroy(Room $room) 
    {
        $room->delete();
        return redirect(action('RoomsController@index'));
    }
}
