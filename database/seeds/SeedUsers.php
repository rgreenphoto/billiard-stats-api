<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'full_name' => 'Ghost Opponent'
        ]);
        DB::table('users')->insert([
            'full_name' => 'April Garcia'
        ]);
        DB::table('users')->insert([
            'full_name' => 'Steven Clark'
        ]);
        DB::table('users')->insert([
            'full_name' => 'Penn Than'
        ]);
        DB::table('users')->insert([
            'full_name' => 'Jeff Brown'
        ]);
        DB::table('users')->insert([
            'full_name' => 'Bart Simpson'
        ]);
        DB::table('users')->insert([
            'full_name' => 'Lisa Simpson'
        ]);
        DB::table('users')->insert([
            'full_name' => 'Bob Mandra'
        ]);
        DB::table('users')->insert([
            'full_name' => 'Audra Wasson'
        ]);

    }
}
