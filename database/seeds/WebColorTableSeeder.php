<?php

use Illuminate\Database\Seeder;

class WebColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'blue',],
            ['name' => 'brown',],
            ['name' => 'darkorange',],
            ['name' => 'darkviolet',],
            ['name' => 'indigo',],
            ['name' => 'gray',],
            ['name' => 'lightblue',],
            ['name' => 'lawngreen',],
            ['name' => 'green',],
            ['name' => 'gold',],
            ['name' => 'red',],
        ];

        DB::table('web_colors')->insert($data);
    }
}
