<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
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

        $categories = ['Playeras', 'Pantalones', 'Camisas', 'Mandiles'];

        foreach ($categories as $categorie) {
	        Category::create([
	            'name' => $categorie
	        ]);
        }

        $this->enableForeignKeys();
    }
}
