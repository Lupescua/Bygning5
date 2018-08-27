<?php

use App\Http\Controllers\RoomsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/home', 'HomeController@index')->name('home');

//I'm using this as main page to test code
Route::get('/', function () {
    return view('home.index');
});

Auth::routes();
// ====================
// USER
// show user profile
Route::get('/profile/{user}','UserController@show');

// update user profile
Route::post('/profile/{user}', 'UserController@update');

// ====================
//  ROOMS

// goes to the Rooms page
Route::get('/rooms', 'RoomsController@index')->name('rooms');

// goes to the save new room page
Route::post('/rooms', 'RoomsController@store');

// Adds a new room to the DB
Route::get('/rooms/create', 'RoomsController@create'); 

// goes to each room in part
Route::get('/rooms/{room}', 'RoomsController@show'); 

// I created a new method for the admin to update since only an admin can update a room
Route::get('/rooms/{room}/update', 'RoomsController@admin_show');

// goes to update room 
Route::post('/rooms/{room}/update', 'RoomsController@update');
// ***
// goes to delete room 
Route::get('/rooms/{room}/delete', 'RoomsController@destroy');         

// ====================
// BOOKING
// ***
// goes to book room 
Route::get('/rooms/{room}/book', 'BookingController@index')->name('room.book'); 
// goes to book room 
Route::post('/rooms/{room}/book', 'BookingController@create')->name('room.create'); 

// goes to each booking in part
Route::get('/bookings/{booking}','BookingController@show');
 
// ====================
// EVENTS
// goes to the Events page
Route::get('/events', 'EventsController@index');

// Adds a new room to the DB
Route::get('/events/create', 'EventsController@create'); 

// goes to the save new room page
Route::post('/events', 'EventsController@store');

// goes to each event in part
Route::get('/events/{event}','EventsController@show');

// Route::post('/events/{event}','EventsController@update');


