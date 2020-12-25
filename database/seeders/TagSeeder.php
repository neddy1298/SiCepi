<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [[
            'tag_name' => 'product_name',
            'tag_body' => '{{ProductName}}',
            'default_raplace' => '',
            'promp_text' => 'your product name'
        ],[
            'tag_name' => 'product_feature',
            'tag_body' => '{{ProductFeature}}',
            'default_raplace' => '',
            'promp_text' => 'your product feature'
        ],[
            'tag_name' => 'business_field',
            'tag_body' => '{{ProductFeature}}',
            'default_raplace' => '',
            'promp_text' => 'your product feature'
        ],[
            'tag_name' => 'user_email',
            'tag_body' => '{{ProductFeature}}',
            'default_raplace' => '',
            'promp_text' => 'your product feature'
        ],[
            'tag_name' => 'user_name',
            'tag_body' => '{{ProductFeature}}',
            'default_raplace' => '',
            'promp_text' => 'your product feature'
        ],[
            'tag_name' => 'company_name',
            'tag_body' => '{{ProductFeature}}',
            'default_raplace' => '',
            'promp_text' => 'your product feature'
        ],[
            'tag_name' => 'company_industry',
            'tag_body' => '{{ProductFeature}}',
            'default_raplace' => '',
            'promp_text' => 'your product feature'
        ]];

        Tag::create($tags);
    }
}
