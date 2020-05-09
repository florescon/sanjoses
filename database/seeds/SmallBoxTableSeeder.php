<?php

use App\SmallBox;
use Illuminate\Database\Seeder;

class SmallBoxTableSeeder extends Seeder
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
            factory(SmallBox::class, 100)->create();
        }

        $this->enableForeignKeys();

    }
}
