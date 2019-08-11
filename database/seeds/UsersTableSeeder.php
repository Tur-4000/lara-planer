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
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@localhost.loc',
                'password' => bcrypt('P@ssw0rd'),
            ],
            [
                'name' => 'Tur',
                'email' => 'tur@localhost.loc',
                'password' => bcrypt('123'),
            ],
        ];

        DB::table('users')->insert($data);
    }
}
