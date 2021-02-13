<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = [[
            'name' => 'Mario',
            'popular' => 1
        ],[
            'name' => 'Teguh',
            'popular' => 0
        ]];

        Author::factory()->count(6)->create();

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}
