<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomsController extends Controller
{
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
        $room->name =request('name');
        $room->description =request('description');
        $room->floor_nr =request('floor_nr');
        // $room->main_pic_id =request('main_pic_id');
        if (request('bookable') == 'on'){
        $room->bookable = 1;
        }else{
        $room->bookable = 0;
        }

        $room->save();

        //redirect to show_all page
        return redirect(action('RoomsController@index'));

        // Room::create(['name', 'description', 'floor_nr', 'main_pic_id', 'bookable', 'pictures'
        // ]);

        // $this->validate(request(),[
        //     'name'=>'required',
        //     'description'=>'required',
        //     'responsible'=>'required',
        //     'deadline'=>'required',
        // ]);
        // auth()->user()->publish(
        //     new Task(request(['name','description','responsible','deadline']))
        // );

        // sessions()->flash('message','Your task has been created');
        
        // I moved the create in the Model
        // Task::create([
        //     'name' => request('name'),
        //     'description' => request('description'),
        //     'responsible' => request('responsible'),
        //     'deadline' => request('deadline'),
        //     'user_id' => auth()->id()
        //     ]);
    }

    
}
