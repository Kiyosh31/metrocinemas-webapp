<?php

use Illuminate\Database\Seeder;

class AuditoriumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Metrocinemas\Auditorium::class, 15)->create();
    }
}
