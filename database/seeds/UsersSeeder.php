<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::where('slug','admin')->first();
        $user = new User;
        $user->full_name = "Md Abu Ahsan Basir";
        $user->username = "admin";
        $user->email = "maab.tips@gmail.com";
        $user->password = Hash::make("123456");
        $user->active = 1;
        $user->save();
        $user->roles()->attach($admin_role,['created_at'=>now(),'updated_at'=>now()]);
        // $admin->role()->updateExistingPivot($admin_role, ['created_at'=>now(),'updated_at'=>now()]);
    }
}
