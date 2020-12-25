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
        $quote = [
            'catalog' => 'Quote'
        ];
        $sales = [
            'catalog' => 'Sales Letter'
        ];

        Catalog::create($quote);
        Catalog::create($sales);
    }
}
