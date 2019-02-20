<?php

use Illuminate\Database\Seeder;
use App\College;

class CollegesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colleges = College::all();
        foreach ($colleges as $college) {
            $college->desc = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Cras tempus eget felis nec tincidunt. Integer sed scelerisque lorem.
                Etiam non auctor risus. Integer tincidunt orci est, non feugiat est bibendum et.
                Phasellus euismod, tortor eu ullamcorper interdum, est ligula gravida diam,
                eget sodales nisl magna tempor odio.';
            $college->image = '1.jpg';
            $college->save();
        }
    }
}
