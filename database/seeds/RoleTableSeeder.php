<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role;
        $role->name = 'A custom user';
        $role->description = 'Only user';
        $role->save();

        $role = new Role;
        $role->name = 'Author';
        $role->description = 'Content writer';
        $role->save();

        $role = new Role;
        $role->name = 'Admin';
        $role->description = 'Manage the page';
        $role->save();
    }
}
