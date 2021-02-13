<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $topics = [[
            'name' => 'Red',
            'popular' => 1
        ],[
            'name' => 'Blue',
            'popular' => 0
        ]];

        Topic::factory()->count(45)->create();
        foreach ($topics as $topic) {
            Topic::create($topic);
        }
    }
}
