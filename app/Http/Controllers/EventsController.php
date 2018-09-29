<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
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
        $data = Event::orderByDesc('start_date')->get();
        
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
                        'url' => "/events/".$value->id,
                    ]
                );
            }
        } 
        $calendar = Calendar::addEvents($events);

        return view('events.fullcalendar', compact('calendar','data'));
        
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
        $validator=$this->validate(request(),['name'=>'required','description'=>'required','start_date'=>'required|date|after:now','end_date'=>'required|date|after:now','adress'=>'required','image'=>'required','link'=>'required|url']);
        
        $event = new Event();
        $event->name = request('name');      
        $event->user_id = auth()->id();
        $event->description = request('description');
        $event->adress = request('adress');    
        $event->start_date = request('start_date');
        $event->end_date = request('end_date');
        $event->link = request('link');            

        if(Input::hasFile('image')){
    		$image = Input::file('image');
    		$filename = $image->getClientOriginalName();
    		Image::make($image)->resize(300, 300)->save( public_path('/img/events/' . $filename ) );
    		$event->image = $filename;
        }

        $event->save();

        return redirect(action('EventsController@index'))->with('success',true)->with('message',"Event created");
    }
// I have the controller but I did not create a view or a route Yet!
    public function update(Request $request, $id)
    {
        $validator = $this->validate(request(),['name'=>'required','description'=>'required','start_date'=>'required','end_date'=>'required','adress'=>'required','image'=>'required','link'=>'required|url']);
 
        $event = Event::find($id)->get();
        $event->name = $request['name'];      
        $event->user_id = Auth::user()->id;
        $event->description = $request['description'];
        $event->adress = $request['adress'];    
        $event->start_date = $request ['start_date'];
        $event->end_date = $request ['end_date'];
        $event->link = $request ['link'];            
        if(Input::hasFile('image')){
            $file = Input::file('image');
            $event->image = $file->getClientOriginalName();
            $file->move('img\events', $file->getClientOriginalName());
        }
        $event->save();
       
        return view('events.show',compact('event'))->with('success',true)->with('message',"Event updated");
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return back()->with('success',true)->with('message',"Event deleted");
    }
}
