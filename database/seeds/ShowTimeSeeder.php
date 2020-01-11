<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShowTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = new Carbon;
        DB::table("show_times")->insert([
            ["showtime"=>$time->now()->addHours(2)],
            ["showtime"=>$time->now()->addHours(4)],
            ["showtime"=>$time->now()->addHours(6)],
            ["showtime"=>$time->now()->addHours(8)],
        ]);
    }
}
