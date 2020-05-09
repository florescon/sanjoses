<?php

use App\Sale;
use Illuminate\Database\Seeder;

class SaleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (app()->environment() !== 'production') {
            factory(Sale::class, 100)->create();
        }

    }
}
