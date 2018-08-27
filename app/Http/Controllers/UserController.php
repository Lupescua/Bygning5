<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;
use Auth;
use App\Event;

class UserController extends Controller
{
    // does not allow someone to access the UserController if the are not logged in
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show(User $user)
    {
        
        $events = Event::where('user_id', $user->id)->get();
        return view('users.profile',compact('user','events'));
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
    public function update(Request $request)
    {   
        $user = Auth::user();     
        // Handle the user upload of avatar
    	if($request->hasFile('image')){
    		$image = $request->file('image');
    		$filename = $image->getClientOriginalName();
    		Image::make($image)->resize(300, 300)->save( public_path('/img/user/' . $filename ) );            
    		$user->image = $filename;
        }
        $user->name =  $request['name']; 
        $user->email =  $request['email']; 
        $user->save();
        
        $events = Event::where('user_id', $user->id)->get();
        return view('users.profile',compact('user','events'));
    
        
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
