<?php

use Illuminate\Database\Seeder;
use App\Color;

class ColorTableSeeder extends Seeder
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

        $categories = ['Blanco', 'Negro', 'Uva', 'Verde', 'Azul', 'Rey', 'Gris', 'Vino', 'Lila', 'Naranja', 'Rojo', 'Paja'];

        foreach ($categories as $categorie) {
	        Color::create([
	            'name' => $categorie
	        ]);
        }

        $this->enableForeignKeys();
    }
}
