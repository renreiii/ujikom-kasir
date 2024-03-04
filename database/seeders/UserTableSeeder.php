<?php

namespace Database\Seeders;

use App\Models\User;
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
        $users = array(
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'foto' => '/img/pp-emot.jpg',
                'level' => 1
            ],
            [
                'name' => 'Ryan Yanuar Pradana',
                'email' => 'kasir1@gmail.com',
                'password' => bcrypt('123456'),
                'foto' => '/img/pp-emot.jpg',
                'level' => 2
            ]
        );

        array_map(function (array $user) {
            User::query()->updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }, $users);
    }
}
