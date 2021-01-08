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
        $admin = [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'is_admin' => 1,
            'password' => bcrypt('admin'),
            'quote_limit' => 10000,
            'writing_limit' => 10000,
        ];
        $user = [
            'name' => 'user',
            'email' => 'user@gmail.com',
            'is_admin' => 0,
            'password' => bcrypt('user'),
        ];
        User::create($admin);
        User::create($user);
        User::factory()->count(10)->create();
    }
}
