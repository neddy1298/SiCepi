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
            'tag_name' => 'Product Name',
            'tag_body' => '{{product_name}}',
            'default_replace' => '',
            'promp_text' => 'your product name'
        ],[
            'tag_name' => 'Product Feature',
            'tag_body' => '{{product_feature}}',
            'default_replace' => '',
            'promp_text' => 'your product feature'
        ],[
            'tag_name' => 'Business Field',
            'tag_body' => '{{business_field}}',
            'default_replace' => '',
            'promp_text' => 'your product feature'
        ],[
            'tag_name' => 'Email Address',
            'tag_body' => '{{email_address}}',
            'default_replace' => '',
            'promp_text' => 'your product feature'
        ],[
            'tag_name' => 'Name',
            'tag_body' => '{{name}}',
            'default_replace' => '',
            'promp_text' => 'your product feature'
        ],[
            'tag_name' => 'Company Name',
            'tag_body' => '{{company_name}}',
            'default_replace' => '',
            'promp_text' => 'your product feature'
        ],[
            'tag_name' => 'Company Industry',
            'tag_body' => '{{company_industry}}',
            'default_replace' => '',
            'promp_text' => 'your product feature'
        ]];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
