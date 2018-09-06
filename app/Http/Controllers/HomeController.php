<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Carousel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderByDesc('start_date')->get();
        $carousels = Carousel::all();

        return view('home.index',compact('events','carousels'));
    }
}
