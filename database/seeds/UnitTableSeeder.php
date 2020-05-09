<?php

use Illuminate\Database\Seeder;
use App\Unit;

class UnitTableSeeder extends Seeder
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

        $categories = ['Pieza', 'Paquete', 'Gramo', 'Centimetro'];

        foreach ($categories as $categorie) {
	        Unit::create([
	            'name' => $categorie
	        ]);
        }

        $this->enableForeignKeys();
    }
}
