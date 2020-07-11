<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Luis',
            'email' => 'luis@luis.com',
            'password'=> bcrypt('123123'),
             'admin' => true
        ]);
    }
}
