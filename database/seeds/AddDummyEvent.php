<?php

use Illuminate\Database\Seeder;
use App\Event;
use App\Carousel;
use App\User;
use App\Room;
use App\Booking;

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
            ['name'=>'Adrian Lupescu', 'email'=>'qwerty@gmail.com','password'=>'qwerty', 'image'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Carol_I_King_of_Romania.jpg/220px-Carol_I_King_of_Romania.jpg', 'admin'=>'1'],
        ];
        foreach ($users as $key => $value){
            User::create($value);
        }

        $events =[
            ['user_id'=>'1', 'name'=>'Dummy event', 'description'=>'Forth Dummy event', 'adress'=>'Nicolai', 'image'=>'https://yt3.ggpht.com/a-/ACSszfH4rgI-WIVE6ZZqYZK-8oCZyEY_L8-FhvJarA=s900-mo-c-c0xffffffff-rj-k-no', 'link'=>'www.google.com', 'start_date'=>'2018-08-19', 'end_date'=>'2018-08-21'],
        ];
        foreach ($events as $key => $value){
            Event::create($value);
        }

        $rooms =[
            ['name'=>'Any Room', 'description'=>'Dummy room. Capibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget
            metus. Nullam id dolor id nibh ultricies vehicula ut id elit. ', 'adress'=>'Nicolai', 'floor_nr'=>'1', 'image'=>'https://www.gizmocrazed.com/wp-content/uploads/2012/12/Crazy-Bedroom-Designs.jpg','bookable'=>'1'],
        ];
        foreach ($rooms as $key => $value){
            Room::create($value);
        }
        
        $bookings =[
            ['name'=>'Dummy booking', 'description'=>'I am just a Dummy Booking', 'user_id'=>'1', 'room_id'=>'1', 'image'=>'https://yt3.ggpht.com/a-/ACSszfH4rgI-WIVE6ZZqYZK-8oCZyEY_L8-FhvJarA=s900-mo-c-c0xffffffff-rj-k-no', 'link'=>'www.google.com', 'start_date'=>'2018-08-19', 'end_date'=>'2018-08-21'],
        ];
        foreach ($bookings as $key => $value){
            Booking::create($value);
        }
        
        $carousels =[
            ['name'=>'Example headline.', 'description'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget
            metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'image'=>'https://www.aoh.dk/storyimage/AO/20170701/ARTIKEL/170709919/AR/0/AR-170709919.jpg&MaxH=415&imageVersion=default&Q=95&MT=DT20170703075154', 'link'=>'www.google.com', 'button'=>'Sign up today'],
            ['name'=>'Another example headline.', 'description'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget
            metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'image'=>'https://www.aoh.dk/storyimage/AO/20170701/ARTIKEL/170709919/EP/1/3/EP-170709919.jpg&MaxW=623&Q=95&MT=DT20170703075154', 'link'=>'www.google.com', 'button'=>'Learn more'],
            ['name'=>'One more for good measure.', 'description'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget
            metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'image'=>'http://www.kbh.dk/files/styles/article_view_fullwidth_1x/public/media/2018/03/skaermbillede_2018-01-15_kl._11.32.12.jpg?itok=plqteDm4', 'link'=>'www.google.com', 'button'=>'Browse gallery'],
        ];
        foreach ($carousels as $key => $value){
            Carousel::create($value);
        }

        
        
    }
}
