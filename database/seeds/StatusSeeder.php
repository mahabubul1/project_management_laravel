<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([

        	'name' 			=> 'Pending',
        	'slug' 			=> slug('pending'),
        	'created_at' 	=> now(),
        	'updated_at' 	=> now(),
        ]);

        Status::create([

            'name'          => 'Progress',
            'slug'          => slug('progress'),
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        Status::create([

        	'name' 			=> 'Approved',
        	'slug' 			=> slug('approved'),
        	'created_at' 	=> now(),
        	'updated_at' 	=> now(),
        ]);
    }
}
