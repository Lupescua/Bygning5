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

class EventsController extends Controller
{
    public function index() 
    {
        // $events = Event::all();
        $events = [];
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
        return view('events.fullcalendar', compact('calendar'));
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

    public function store(User $user)
    {
        $request = request()->all();
        $validator = Validator::make($request,['name'=>'required']);
        
        if ($validator->fails()){
            \Session::flash('warning','Please enter the valid details');
            return Redirect::to('/events/create')->withInput()->withErrors($validator);
        }

        Event::create([
            'name' => request('name'),
            'user_id' => '1',
            // 'user_id' => $user->id,
            'description' => request('description'),
            'adress' => request('adress'),
            'start_date' => request('start_date'),
            // 'start_date' => strtotime(request('start_date').request('start_time')),
            'end_date' => request('end_date'),
            'main_pic_name' => request('main_pic_name'),
            'link' => request('link')
        ]);
          
        \Session::flash('succes','A new Event has been added');

        //redirect to show_all page
        return redirect(action('EventsController@index'));
    }
}
