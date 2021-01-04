<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $templates = [[
            'catalog_id' => 1,
            'template_name' => 'Sales Letter Sample Group 1',
            'template_intro' => 'Here are some sales letters that demonstrate how this automatic writing system work.',
            'status' => 'Not Published'
        ],[
            'catalog_id' => 1,
            'template_name' => 'Sales Letter Sample Group 2',
            'template_intro' => 'Another sales template another sales template',
            'status' => 'Published'
        ],[
            'catalog_id' => 2,
            'template_name' => 'Basic sample of CTA',
            'template_intro' => 'Here is the 10 static examples of CTA',
            'status' => 'Published'
        ]];

        foreach ($templates as $template) {

            Template::create($template);
        }

    }
}
