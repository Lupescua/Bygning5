<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;
use Auth;
use App\Event;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

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
        
        $users = User::all();
        return view('users.index',compact('users'));
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
    public function update(Request $request, $id)
    {   
        return Validator::make($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',  
            'image' => 'required', 
        ]);
        $user =  User::where('id', $id)->first();
        if($request->hasFile('image')){
    		$image = $request->file('image');
    		$filename = $image->getClientOriginalName();
    		Image::make($image)->resize(300, 300)->save( public_path('/img/user/' . $filename ) );            
    		$user->image = $filename;
        }
        $user->name =  $request['name']; 
        $user->email =  $request['email']; 
        $user->save();
        
        return redirect(action('UserController@index')); 
        
    }

    public function updateAdmin(Request $request)
    {   
        $user = User::where('id', $request['user_id'])->first();
        $user->admin = $request['admin']; 
        $user->update();
        
        return redirect(action('UserController@index')); 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $users = User::all();
        return view('users.index',compact('users'));
    }
}
