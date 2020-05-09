<?php

use App\Expense;
use Illuminate\Database\Seeder;

class ExpenseTableSeeder extends Seeder
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
            factory(Expense::class, 100)->create();
        }

        $this->enableForeignKeys();
    }
}
