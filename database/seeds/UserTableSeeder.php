<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Mg Mg';
        $user->username = 'mgmg';
        $user->email = 'mgmg@gmail.com';
        $user->password = bcrypt('12345678');
        $user->save();

        $user = new User;
        $user->name = 'Aung Aung';
        $user->username = 'aungaung';
        $user->email = 'aungaung@gmail.com';
        $user->password = bcrypt('12345678');
        $user->save();

        $user = new User;
        $user->name = 'Mya Mya';
        $user->username = 'myamya';
        $user->email = 'myamya@gmail.com';
        $user->password = bcrypt('12345678');
        $user->save();
    }
}
