<?php

use Illuminate\Database\Seeder;

class LaapiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Laapi::class,30)->create();
    }
}
