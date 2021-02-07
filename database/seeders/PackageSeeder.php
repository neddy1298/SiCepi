<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $package = [
            'name' => 'Paket Basic',
            'value' => 10,
            'price' => 10000,
        ];
        Package::create($package);
    }
}
