<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([LocationSeeder::class, TheatreSeeder::class, FilmSeeder::class,ShowTimeSeeder::class]);
    }
}
