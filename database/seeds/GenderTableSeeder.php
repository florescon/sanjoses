<?php

use Illuminate\Database\Seeder;
use App\Gender;

class GenderTableSeeder extends Seeder
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

        $categories = ['Hombre', 'Mujer', 'Niños', 'Niños', 'Bebes', 'Sin genero'];

        foreach ($categories as $categorie) {
	        Gender::create([
	            'name' => $categorie
	        ]);
        }

        $this->enableForeignKeys();
    }
}
