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
            ['user_id'=>'1', 'name'=>'Dummy event', 'description'=>'Forth Dummy event', 'adress'=>'Nicolai', 'image'=>'https://yt3.ggpht.com/a-/ACSszfH4rgI-WIVE6ZZqYZK-8oCZyEY_L8-FhvJarA=s900-mo-c-c0xffffffff-rj-k-no', 'link'=>'www.google.com', 'start_date'=>'2018-08-19', 'end_date'=>'2018-08-21'],
        ];
        foreach ($data as $key => $value){
            Event::create($value);
        }
    }
}
