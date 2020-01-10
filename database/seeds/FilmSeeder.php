<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("films")->insert([
            [ "title" => "X-Men"],
            [ "title" => "Fast 5"],
        ]);
    }
}
