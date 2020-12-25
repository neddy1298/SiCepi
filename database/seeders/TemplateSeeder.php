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
            'template' => 'default',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti possimus dignissimos doloremque quos accusantium iusto similique maiores ipsa ut laborum assumenda quibusdam, praesentium quam accusamus quae odit, deserunt error rem.'
        ];
        $sales = [
            'catalog_id' => 2,
            'template' => 'Sales Letter 1',
            'text' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic asperiores, vel alias veniam dolorum, fugit enim similique molestiae voluptates doloremque cupiditate voluptate aut aspernatur? Atque minus quam eligendi laboriosam quos.'
        ];

        Template::create($quote);
        Template::create($sales);
    }
}
