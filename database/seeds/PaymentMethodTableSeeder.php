<?php

use App\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodTableSeeder extends Seeder
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

        PaymentMethod::create([
            'name' => 'Efectivo',
        ]);

        PaymentMethod::create([
            'name' => 'Tarjeta',
        ]);

        $this->enableForeignKeys();

    }
}
