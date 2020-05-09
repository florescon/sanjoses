<?php

use Illuminate\Database\Seeder;
use App\Line;

class LineTableSeeder extends Seeder
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

        $categories = ['Basico', 'Esencial', 'Unico', 'Dinamica'];

        foreach ($categories as $categorie) {
	        Line::create([
	            'name' => $categorie
	        ]);
        }

        $this->enableForeignKeys();
    }
}
