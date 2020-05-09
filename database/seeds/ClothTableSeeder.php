<?php

use Illuminate\Database\Seeder;
use App\Cloth;

class ClothTableSeeder extends Seeder
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

        $categories = ['Praga', 'Oslo', 'Filare', 'Venecia', 'Milan', 'Torino', 'Niza', 'Lucca', 'Florencia', 'Toscana', 'Capri', 'Napoles', 'Mezclilla', 'Oxford', 'Premium', 'Gabardina', 'Mil Rayas', 'Mezclilla Elite', 'Dry', 'Elite', 'Dinamo'];

        foreach ($categories as $categorie) {
	        Cloth::create([
	            'name' => $categorie
	        ]);
        }

        $this->enableForeignKeys();
    }
}
