<?php

use App\Note;
use Illuminate\Database\Seeder;

class NoteTableSeeder extends Seeder
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
            factory(Note::class, 100)->create();
        }

        $this->enableForeignKeys();
    }
}
