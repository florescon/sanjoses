<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusTableSeeder extends Seeder
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

        Status::create([
            'id' => 1,
            'name' => 'Inicio de orden',
            'description' => 'Inicio de orden',
            'level' => -1,
        ]);

        Status::create([
            'id' => 2,
            'name' => 'Final de orden',
            'description' => 'Final de orden',
            'level' => 10,
        ]);

        Status::create([
            'id' => 3,
            'name' => 'Producción',
            'description' => 'Producción',
            'level' => 0,
        ]);

        $this->enableForeignKeys();
    }
}
