<?php

use Illuminate\Database\Seeder;
use App\Event;
use App\Carousel;
use App\User;
use App\Room;
use App\Booking;
use App\Partners;

class AddDummyEvent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =[
            ['name'=>'Adrian Lupescu', 'email'=>'qwerty@gmail.com','password'=>'qwerty', 'image'=>'default.jpg', 'admin'=>'1'],
        ];
        foreach ($users as $key => $value){
            User::create($value);
        }

        $events =[
            ['user_id'=>'1', 'name'=>'Dummy event', 'description'=>'Forth Dummy event', 'adress'=>'Nicolai', 'image'=>'dummy_placeholder.jpg', 'link'=>'www.google.com', 'start_date'=>'2018-08-19', 'end_date'=>'2018-08-21'],
        ];
        foreach ($events as $key => $value){
            Event::create($value);
        }

        $rooms =[
            ['name'=>'Any Room', 'description'=>'All my rooms are amazing and good', 'adress'=>'Nicolai', 'floor_nr'=>'1', 'image'=>'room_placeholder.jpg','bookable'=>'1'],
        ];
        foreach ($rooms as $key => $value){
            Room::create($value);
        }
        
        $bookings =[
            ['name'=>'Dummy booking', 'description'=>'I am just a Dummy Booking', 'user_id'=>'1', 'room_id'=>'1', 'image'=>'dummy_placeholder.jpg', 'link'=>'www.google.com', 'start_date'=>'2018-08-19', 'end_date'=>'2018-08-21'],
        ];
        foreach ($bookings as $key => $value){
            Booking::create($value);
        }
        
        $carousels =[
            ['name'=>'Example headline.', 'description'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget
            metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'image'=>'1.jpg', 'link'=>'https://www.google.com', 'button'=>'Sign up today'],
            ['name'=>'Another example headline.', 'description'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget
            metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'image'=>'2.jpg', 'link'=>'https://www.google.com', 'button'=>'Learn more'],
            ['name'=>'One more for good measure.', 'description'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget
            metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'image'=>'3.jpeg', 'link'=>'https://www.google.com', 'button'=>'Browse gallery'],
        ];
        foreach ($carousels as $key => $value){
            Carousel::create($value);
        }

        $partners =[
            ['name'=>'The chocolate factory', 'description'=>'Charlie has been making chocolate for 200 years', 'image'=>'1.jpg', 'link'=>'https://www.google.com/search?q=The+chocolate+factory'],
            ['name'=>'3 legged Laptops', 'description'=>'Sick and tired of 4 legged laptops?', 'image'=>'2.jpg', 'link'=>'https://www.google.com/search?q=3+legged+Laptops'],
            ['name'=>'Seville Barber', 'description'=>'Not only trim your beard, but nose and shoes as well', 'image'=>'3.jpg', 'link'=>'https://www.google.com/search?q=Sevilia+Barber'],
        ];
        foreach ($partners as $key => $value){
            Partners::create($value);
        }
        
        
    }
}
