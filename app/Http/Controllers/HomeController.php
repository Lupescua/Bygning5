<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Carousel;
use Image;

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

    public function updateCarousel(Request $request)
    {   
        
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'link' => 'required|url',
            'button' => 'required|string|max:25',
            "image"  => "dimensions:max_width=930,max_height=530",
        ]);

        $carousel = Carousel::where('id', $request['id'])->first();
    
        if($request->hasFile('image')){
    		$image = $request->file('image');
    		$filename = $image->getClientOriginalName();
    		Image::make($image)->save( public_path('img/carousel/' . $filename ) );            
    		$carousel->image = $filename;
        }
        $carousel->name =  $request['name']; 
        $carousel->description =  $request['description']; 
        $carousel->link =  $request['link']; 
        $carousel->button =  $request['button'];         
        $carousel->save();
        return redirect()->back()->with('success',true)->with('message',"Carousel updated");
    }
}
