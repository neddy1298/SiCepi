<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PromoCode;

class PromoCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $code = [
            'name' => 'Paket Basic',
            'code' => 'free',
            'value' => 10,
            'price' => 10000,
        ];
        PromoCode::create($code);
    }
}
