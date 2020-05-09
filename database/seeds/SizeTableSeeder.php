<?php

use Illuminate\Database\Seeder;
use App\Size;

class SizeTableSeeder extends Seeder
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

        $categories = ['ECH', 'CH', 'M', 'G', 'EG', '44', '46', '48', '50', '52', '54', '56', '58', '60'];

        foreach ($categories as $categorie) {
	        Size::create([
	            'name' => $categorie
	        ]);
        }

        $this->enableForeignKeys();
    }
}
