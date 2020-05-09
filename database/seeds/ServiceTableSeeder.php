<?php

use App\Product;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->disableForeignKeys();

        if (app()->environment() !== 'production') {
            factory(Product::class, 100)->create();
        }

        $this->enableForeignKeys();

    }
}
