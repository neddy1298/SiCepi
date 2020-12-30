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
            'is_admin' => 0,
            'password' => bcrypt('user'),
        ];
        $admin = [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'is_admin' => 1,
            'password' => bcrypt('admin'),
        ];
        User::create($user);
        User::create($admin);
    }
}
