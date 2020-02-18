<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
           'first_name' =>'admin',
           'last_name' =>'admin',
           'role' =>'admin',
           'email' =>'admin@gmail.com',
           'password' =>Hash::make('admin2020'),
        ]);
    }
}
