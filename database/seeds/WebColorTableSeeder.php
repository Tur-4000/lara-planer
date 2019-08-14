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
            [
                'name' => 'blue',
                'title' => 'Синий',
                'background' => '0000ff',
                'color' => 'fff',
            ],
            [
                'name' => 'brown',
                'title' => 'Коричневый',
                'background' => 'a52a2a',
                'color' => 'fff',
            ],
            [
                'name' => 'darkorange',
                'title' => 'Тёмно-оранжевый',
                'background' => 'ff8c00',
                'color' => '000',
            ],
            [
                'name' => 'darkviolet',
                'title' => 'Тёмно-лиловый',
                'background' => '9400d3',
                'color' => 'fff',
            ],
            [
                'name' => 'indigo',
                'title' => 'Индиго',
                'background' => '4B0082',
                'color' => 'fff',
            ],
            [
                'name' => 'gray',
                'title' => 'Серый',
                'background' => '808080',
                'color' => '000',
            ],
            [
                'name' => 'lightblue',
                'title' => 'Голубой',
                'background' => 'ADD8E6',
                'color' => '000',
            ],
            [
                'name' => 'lawngreen',
                'title' => 'Зелёная трава',
                'background' => '7CFC00',
                'color' => '000',
            ],
            [
                'name' => 'green',
                'title' => 'Зелёный',
                'background' => '008000',
                'color' => 'fff',
            ],
            [
                'name' => 'gold',
                'title' => 'Золотой',
                'background' => 'FFD700',
                'color' => '000',
            ],
            [
                'name' => 'red',
                'title' => 'Красный',
                'background' => 'FF0000',
                'color' => 'fff',
            ],
            [
                'name' => 'maroon',
                'title' => 'Каштановый',
                'background' => '800000',
                'color' => 'fff',
            ],
        ];

        DB::table('web_colors')->insert($data);
    }
}
