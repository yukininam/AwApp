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
            'address' => 'Tarlac City',
            'city' => 'Tarlac',
            'state' => 'Tarlac',
            'country' => 'Philippines',
            'pincode' => '2300',
            'mobile' => '09453197109',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'admin' => 1
        ]);
    }
}
