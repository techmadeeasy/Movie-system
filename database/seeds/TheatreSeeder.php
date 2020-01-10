<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TheatreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $save = DB::table("theatres")->insert([
            [ "name"=>"Theatre 1", "location_id"=>1],
            [ "name"=>"Theatre 2", "location_id"=>1],
            [ "name"=>"Theatre 2", "location_id"=>2],
            [ "name"=>"Theatre 1", "location_id"=>2],
        ]);
    }
}
