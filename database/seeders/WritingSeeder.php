<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Writing;

class WritingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $writings = [[
            'user_id' => 1,
            'name' => 'test1',
            'category' => 'Quote',
            'text' => "If you don't design your own life plan, chances are you'll fall into someone else's plan. And guess what they have planned for you? Not much.",
            'topics' => "Chances,Design,Else,Fall,Guess,Life,Much,Own,Plan,Planned,Someone,You,Your",
            'author' => "Jim Rohn",
        ],[
            'user_id' => 1,
            'name' => 'test2',
            'category' => 'Quote',
            'text' => "Take care of your body. It's the only place you have to live.",
            'topics' => "Body,Care,Live,Only,Place,Take,TakeCare,You,Your,Your Body",
            'author' => "Jim Rohn",
        ],[
            'user_id' => 1,
            'name' => 'test3',
            'category' => 'Quote',
            'text' => "Motivation is the art of getting people to do what you want them to do because they want to do it.",
            'topics' => "Art,Because,Getting,Motivation,People,Them,Want,You",
            'author' => "Dwight D. Eisenhower",
        ],[
            'user_id' => 1,
            'name' => 'test4',
            'category' => 'Quote',
            'text' => "In preparing for battle I have always found that plans are useless, but planning is indispensable.",
            'topics' => "Always,Battle,Found,Indispensable,Planning,Plans,Preparing,Useless",
            'author' => "Dwight D. Eisenhower",
        ],[
            'user_id' => 1,
            'name' => 'test5',
            'category' => 'Quote',
            'text' => "Defeat may serve as well as victory to shake the soul and let the glory out.",
            'topics' => "Defeat,Glory,May,Out,Serve,Shake,Soul,Victory,Well",
            'author' => "Edwin Markham",
        ],[
            'user_id' => 1,
            'name' => 'test6',
            'category' => 'Quote',
            'text' => "The only abnormality is the incapacity to love.",
            'topics' => "Incapacity,Love,Only,To Love",
            'author' => "Anais Nin",
        ],[
            'user_id' => 1,
            'name' => 'test7',
            'category' => 'Quote',
            'text' => "Fine art is that in which the hand, the head, and the heart of man go together.",
            'topics' => "Art,Fine,FineArt,Go,Hand,Head,Heart,Man,Together,Which",
            'author' => "John Ruskin",
        ],[
            'user_id' => 1,
            'name' => 'test8',
            'category' => 'Quote',
            'text' => "If people think nature is their friend, then they sure don't need an enemy.",
            'topics' => "Enemy,Friend,Nature,Need,People,Sure,Then,Think",
            'author' => "Kurt Vonnegut",
        ]];

        foreach ($writings as $writing) {

            Writing::create($writing);
        }
    }
}
