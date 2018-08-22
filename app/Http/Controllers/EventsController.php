<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller;
use App\Event;
use App\User;
use Calendar;
use Validator;
use Auth;
use Session;
use Image;
use Illuminate\Support\Facades\Input as Input;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }
    
    public function index() 
    {
        // $events = Event::all();
       
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->name,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
	                [
	                    'color' => '#f05050',
	                    'url' => 'pass here url and any route',
	                ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);

        // $events = $data;

        return view('events.fullcalendar', compact('calendar','data'));
        // return view('events.index',compact('events'));
    }
    
    public function show(Event $event) 
    {
        return view('events.show',compact('event'));
    }

    
    public function create()
    {
       return view('events.create');

    }

    public function store( User $user)
    {
        $request = request()->all();
        $validator = Validator::make($request,['name'=>'required']);
        
        if ($validator->fails()){
            \Session::flash('warning','Please enter the valid details');
            return Redirect::to('/events/create')->withInput()->withErrors($validator);
        }

        $event = new Event();
        $event->name = request('name');      
        $event->user_id = auth()->id();
        $event->description = request('description');
        $event->adress = request('adress');    
        $event->start_date = request('start_date');
        // 'start_date' => strtotime(request('start_date').request('start_time')),
        $event->end_date = request('end_date');
        $event->link = request('link');            

        if(Input::hasFile('image')){
    		$image = Input::file('image');
    		$filename = $image->getClientOriginalName();
    		Image::make($image)->resize(300, 300)->save( public_path('/img/events/' . $filename ) );
    		$event->image = $filename;
        }

        $event->save();

        \Session::flash('succes','A new Event has been added');

        //redirect to show_all page
        return redirect(action('EventsController@index'));
    }

    public function update(Request $request, $id)
    {

        $event = Event::find($id)->get();
        $event->name = $request['name'];      
        $event->user_id = Auth::user()->id;
        // 'user_id' => $user->id,
        $event->description = $request['description'];
        $event->adress = $request['adress'];    
        $event->start_date = $request ['start_date'];
        // 'start_date' => strtotime(request('start_date').request('start_time')),
        $event->end_date = $request ['end_date'];
        $event->link = $request ['link'];            
        if(Input::hasFile('image')){
            $file = Input::file('image');
            $event->image = $file->getClientOriginalName();
            $file->move('img\events', $file->getClientOriginalName());
        }
        $event->save();
       
        return view('events.show',compact('event'));
    }

    public function destroy()
    {

    }
}
