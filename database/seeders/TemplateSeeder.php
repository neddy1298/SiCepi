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
        $quote = [
            'catalog_id' => 1,
            'template_name' => 'default',
            'template_intro' => 'test',
            'status' => 'Published'
        ];
        $sales = [
            'catalog_id' => 2,
            'template_name' => 'Sales Letter 1',
            'template_intro' => 'test',
            'status' => 'Not Published'
        ];

        Template::create($quote);
        Template::create($sales);
    }
}
