<?php

use App\Income;
use Illuminate\Database\Seeder;

class IncomeTableSeeder extends Seeder
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
            factory(Income::class, 100)->create();
        }

        $this->enableForeignKeys();
    }
}
