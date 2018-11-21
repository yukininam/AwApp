<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            
            'name' => 'Appliances',
            'description' => 'asdasd',
            'url' => 'test',
            'status' => 1
        ]);
    }
}
