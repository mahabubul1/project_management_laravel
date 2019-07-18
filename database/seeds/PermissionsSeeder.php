<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Permission::create([

        	'name' 			=> 'Add Task',
        	'slug' 			=> slug('add task'),
        	'created_at' 	=> now(),
        	'updated_at' 	=> now(),
        ]);

        Permission::create([

        	'name' 			=> 'Edit Task',
        	'slug' 			=> slug('edit task'),
        	'created_at' 	=> now(),
        	'updated_at' 	=> now(),
        ]);

        Permission::create([

        	'name' 			=> 'Delete Task',
        	'slug' 			=> slug('delete task'),
        	'created_at' 	=> now(),
        	'updated_at' 	=> now(),
        ]);
    }
}
