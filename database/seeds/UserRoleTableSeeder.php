<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);
        $role = Role::where('name', 'A custom user')->get();
        $user->roles()->attach($role);

        $user = User::find(2);
        $role = Role::where('name', 'Author')->get();
        $user->roles()->attach($role);   
        
        $user = User::find(3);
        $role = Role::where('name', 'Admin')->get();
        $user->roles()->attach($role);
    }
}
