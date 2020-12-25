<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'user',
            'email' => 'user@gmail.com',
            'role' => 'user',
            'password' => bcrypt('user'),
        ];
        $admin = [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('admin'),
        ];
        User::create($user);
        User::create($admin);
    }
}
