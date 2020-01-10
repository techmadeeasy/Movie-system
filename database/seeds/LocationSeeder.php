<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $save = DB::table("locations")->insert([
          [ "suburb"=>"Midrand", "city"=>"Johannesburg"],
          [ "suburb"=>"Claremont", "city"=>"Cape Town"],
       ]);
    }
}
