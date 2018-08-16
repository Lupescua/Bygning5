<?php

use Illuminate\Database\Seeder;
use App\Event;

class AddDummyEvent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            ['user_id'=>'1', 'name'=>'Dummy event 1', 'description'=>'First Dummy event', 'adress'=>'Nicolai', 'main_pic_name'=>'1.jpg', 'link'=>'www.google.com', 'start_date'=>'2018-08-19', 'end_date'=>'2018-08-21'],
            ['user_id'=>'1', 'name'=>'Dummy event 2', 'description'=>'Second Dummy event', 'adress'=>'Nicolai', 'main_pic_name'=>'2.jpg', 'link'=>'www.google.com', 'start_date'=>'2018-08-19', 'end_date'=>'2018-08-21'],
            ['user_id'=>'1', 'name'=>'Dummy event 3', 'description'=>'Third Dummy event', 'adress'=>'Nicolai', 'main_pic_name'=>'3.jpg', 'link'=>'www.google.com', 'start_date'=>'2018-08-19', 'end_date'=>'2018-08-21'],
            ['user_id'=>'1', 'name'=>'Dummy event 4', 'description'=>'Forth Dummy event', 'adress'=>'Nicolai', 'main_pic_name'=>'4.jpg', 'link'=>'www.google.com', 'start_date'=>'2018-08-19', 'end_date'=>'2018-08-21'],
        ];
        foreach ($data as $key => $value){
            Event::create($value);
        }
    }
}
