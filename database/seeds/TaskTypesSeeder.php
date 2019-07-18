<?php

use App\TaskType;
use Illuminate\Database\Seeder;

class TaskTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskType::create([

        	'name' 			=> 'blog post 500 words',
        	'slug' 			=> slug('blog post 500 words'),
        	'created_at' 	=> now(),
        	'updated_at' 	=> now(),
        ]);

        TaskType::create([

        	'name' 			=> 'blog post 750 words',
        	'slug' 			=> slug('blog post 750 words'),
        	'created_at' 	=> now(),
        	'updated_at' 	=> now(),
        ]);

        TaskType::create([

        	'name' 			=> 'blog post 1000 words',
        	'slug' 			=> slug('blog post 1000 words'),
        	'created_at' 	=> now(),
        	'updated_at' 	=> now(),
        ]);

        TaskType::create([

        	'name' 			=> 'blog post 1500 words',
        	'slug' 			=> slug('blog post 1500 words'),
        	'created_at' 	=> now(),
        	'updated_at' 	=> now(),
        ]);

        TaskType::create([

        	'name' 			=> 'press release 500 words',
        	'slug' 			=> slug('press release 500 words'),
        	'created_at' 	=> now(),
        	'updated_at' 	=> now(),
        ]);

        TaskType::create([

        	'name' 			=> 'press release 750 words',
        	'slug' 			=> slug('press release 750 words'),
        	'created_at' 	=> now(),
        	'updated_at' 	=> now(),
        ]);

        TaskType::create([

        	'name' 			=> 'press release 1000 words',
        	'slug' 			=> slug('press release 1000 words'),
        	'created_at' 	=> now(),
        	'updated_at' 	=> now(),
        ]);

        TaskType::create([

        	'name' 			=> 'press release 1500 words',
        	'slug' 			=> slug('press release 1500 words'),
        	'created_at' 	=> now(),
        	'updated_at' 	=> now(),
        ]);

        TaskType::create([

        	'name' 			=> 'case study 1500 words',
        	'slug' 			=> slug('case study 1500 words'),
        	'created_at' 	=> now(),
        	'updated_at' 	=> now(),
        ]);

        TaskType::create([

        	'name' 			=> 'case study 3000 words',
        	'slug' 			=> slug('case study 3000 words'),
        	'created_at' 	=> now(),
        	'updated_at' 	=> now(),
        ]);

        TaskType::create([

        	'name' 			=> 'whitepaper 3000 words',
        	'slug' 			=> slug('whitepaper 3000 words'),
        	'created_at' 	=> now(),
        	'updated_at' 	=> now(),
        ]);


    }
}
