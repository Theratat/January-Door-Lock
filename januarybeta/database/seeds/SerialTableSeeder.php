<?php

use Illuminate\Database\Seeder;
use App\Serial;

class SerialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Serial::class , 100)->create();
    }
}
