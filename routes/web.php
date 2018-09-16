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
Route::get('/', 'HomeController@index')->name('home');

//I'm using this as main page to test code
// Route::get('/home', function () {
//     return view('home.index');
// });

Auth::routes();
// ====================
// USER
// show user profile
Route::get('/profile/{user}','UserController@show');

// update user profile
Route::put('/profile/{id}', 'UserController@update');

// update user profile
Route::post('/profile/{id}/update', 'UserController@updateAdmin');

// delete user profile
Route::delete('/profile/{user}', 'UserController@destroy')->name('users.destroy');;

// see all users
Route::get('/all_users','UserController@index');
// ====================
//  ROOMS

// goes to the Rooms page
Route::get('/rooms', 'RoomsController@index')->name('rooms');

// goes to the save new room page
Route::post('/rooms', 'RoomsController@store');

// Adds a new room to the DB
Route::get('/rooms/create', 'RoomsController@create'); 

// goes to each room in part
Route::get('/rooms/{room}', 'RoomsController@show')->name('room.show'); ; 

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
 
// delete each booking in part
Route::delete('/bookings/{booking}','BookingController@destroy');

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
 
// delete each booking in part
Route::delete('/events/{event}','EventsController@destroy');


Route::post('/carousel/edit', 'CarouselController@edit'); 



