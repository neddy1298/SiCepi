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
        $sales = [
            'catalog_id' => 1,
            'template_name' => 'Sales Letter Sample Group 1',
            'template_intro' => 'Here are some sales letters that demonstrate how this automatic writing system work.',
            'status' => 'Not Published'
        ];
        $sales2 = [
            'catalog_id' => 1,
            'template_name' => 'Sales Letter Sample Group 2',
            'template_intro' => 'Another sales template another sales template',
            'status' => 'Published'
        ];

        Template::create($sales);
        Template::create($sales2);
    }
}
