<?php

namespace App\Http\Controllers;

use App\Partners;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Validator;
use Auth;
use Image;
use Illuminate\Support\Facades\Input as Input;

class PartnersController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partners::all();
        return view('partners.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),['name'=>'required','description'=>'required','image'=>'required','link'=>'required|url']);

        $partner = new Partners();
        $partner->name = request('name');      
        $partner->description = request('description');
        $partner->link = request('link');
        if(Input::hasFile('image')){
    		$image = Input::file('image');
    		$filename = $image->getClientOriginalName();
    		Image::make($image)->resize(300, 300)->save( public_path('/img/partners/' . $filename ) );
    		$partner->image = $filename;
        }
        $partner->save();

        return redirect(action('PartnersController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function show(Partners $partners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function edit(Partners $partners)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partners $partners)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partners $partners)
    {
        //
    }
}
