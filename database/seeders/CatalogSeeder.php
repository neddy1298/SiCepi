<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalog;
class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sales = [[
            'catalog' => 'Sales Letter',
            'description' => 'Sales Letter'
        ],[
            'catalog' => 'Call To Action',
            'description' => 'Call To Action'
        ],[
            'catalog' => 'Facebokk Ads',
            'description' => 'Facebokk Ads'
        ],[
            'catalog' => 'Google AdWords Ads',
            'description' => 'Google AdWords Ads'
        ],[
            'catalog' => 'Email Campaign',
            'description' => 'Email Campaign'
        ],[
            'catalog' => 'Headlines',
            'description' => 'Headlines'
        ],[
            'catalog' => 'Webinars',
            'description' => 'Webinars'
        ],[
            'catalog' => 'Upsells',
            'description' => 'Upsells'
        ],[
            'catalog' => 'OPT-IN Pages',
            'description' => 'OPT-IN Pages'
        ],[
            'catalog' => 'Cold Phone Scripts',
            'description' => 'Cold Phone Scripts'
        ],[
            'catalog' => 'Testimonials',
            'description' => 'Testimonials'
        ],];

        foreach ($sales as $sale) {
            Catalog::create($sale);
        }
    }
}
