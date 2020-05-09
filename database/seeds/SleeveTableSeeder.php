<?php

use Illuminate\Database\Seeder;
use App\Sleeve;

class SleeveTableSeeder extends Seeder
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

        $categories = ['Corta', 'Larga', 'Musculosa', 'Strapless', 'Tres-cuartos'];

        foreach ($categories as $categorie) {
	        Sleeve::create([
	            'name' => $categorie
	        ]);
        }

        $this->enableForeignKeys();
    }
}
