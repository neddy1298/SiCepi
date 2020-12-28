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
            'tag_name' => 'Company Industry',
            'tag_body' => '{{company_industry}}',
            'default_replace' => '',
            'promp_text' => 'Your company industry'
        ],[
            'tag_name' => 'Email Address',
            'tag_body' => '{{email_address}}',
            'default_replace' => '',
            'promp_text' => 'Your email address'
        ],[
            'tag_name' => 'Feature of Product',
            'tag_body' => '{{product_features}}',
            'default_replace' => '',
            'promp_text' => 'Features of your product'
        ],[
            'tag_name' => 'Business Field',
            'tag_body' => '{{business_field}}',
            'default_replace' => '',
            'promp_text' => 'Your business field'
        ],[
            'tag_name' => 'Product name',
            'tag_body' => '{{product_name}}',
            'default_replace' => '',
            'promp_text' => 'Your product maname'
        ],[
            'tag_name' => 'Company Name',
            'tag_body' => '{{company_name}}',
            'default_replace' => '',
            'promp_text' => 'Your company name'
        ],[
            'tag_name' => 'Name',
            'tag_body' => '{{name}}',
            'default_replace' => '',
            'promp_text' => 'Your name'
        ]];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
