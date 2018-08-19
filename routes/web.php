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

//I'm using this as main page to test code
Route::get('/', function () {
    return view('home.index');
});

// goes to the main page
// Route::get('/', function () {
//     return view('welcome');
// });

// goes to the Booking page
Route::get('/rooms', 'RoomsController@index');

// Adds a new room to the DB
Route::get('/rooms/create', 'RoomsController@create'); 

// goes to the save new room page
Route::post('/rooms', 'RoomsController@store');

// goes to each room in part
Route::get('/rooms/{room}', 'RoomsController@show'); 

// goes to each room in part
// Route::get('/rooms/{room}/edit', 'RoomsController@edit'); 
// when I edit, my post will submit a Patch request  Route::patch('/rooms/{room}', 'RoomsController@?'); 

// goes to the Events page
Route::get('/events', 'EventsController@index');

// Adds a new room to the DB
Route::get('/events/create', 'EventsController@create'); 

// goes to the save new room page
Route::post('/events', 'EventsController@store');

// goes to each event in part
Route::get('/events/{event}','EventsController@show');

// Route::post('/events/{event}','EventsController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile/{user}','UserController@show');
Route::post('/profile/{user}', 'UserController@update');
