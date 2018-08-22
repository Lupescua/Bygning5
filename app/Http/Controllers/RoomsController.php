<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use Illuminate\Support\Facades\Input as Input;

class RoomsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }

    public function index() 
    {
        // $rooms = Room::all();
        $rooms = Room::orderby('name','asc')->get();
        // dd($rooms);
        return view('rooms.index',compact('rooms'));
    }
    
    public function show(Room $room) 
    {
        return view('rooms.show',compact('room'));
    }
    
    public function create()
    {
       return view('rooms.create');

    }

    public function store()
    {
        $this->validate(request(),['name'=>'required']);
    
        $room = new Room();
        $room->name = request('name');
        $room->description = request('description');
        $room->floor_nr = request('floor_nr');
        $room->adress = request('adress');
        if (request('bookable') == 'on'){
        $room->bookable = 1;
        }else{
        $room->bookable = 0;
        }                
        // $room->image = request('image');
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

    public function update(Room $room)
    {   
        $room->name = request('name');
        $room->description = request('description');
        $room->floor_nr = request('floor_nr');
        $room->adress = request('adress');
        if (request('bookable') == 'on'){
        $room->bookable = 1;
        }else{
        $room->bookable = 0;
        }                
        // $room->image = request('image');
        if(Input::hasFile('image')){
            $file = Input::file('image');
            $room->image = $file->getClientOriginalName();
            $file->move('img\rooms', $file->getClientOriginalName());
        }
        $room->save();

        //redirect to show_all page
        return redirect(action('RoomsController@index'));  
        
    }

    public function destroy(Room $room) 
    {
         dd($room);
        $room->delete();
        return redirect(action('RoomsController@index'));
    }
    
}
