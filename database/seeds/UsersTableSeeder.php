<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Lexter Gangat',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'admin' => 1
        ]);
    }
}
