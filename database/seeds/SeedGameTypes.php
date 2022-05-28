<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedGameTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('game_types')->insert([
            'name' => '8 Ball',
        ]);
        DB::table('game_types')->insert([
            'name' => '9 Ball',
        ]);
        DB::table('game_types')->insert([
            'name' => '10 Ball',
        ]);
        DB::table('game_types')->insert([
            'name' => 'One Pocket',
        ]);
        DB::table('game_types')->insert([
            'name' => 'Other',
        ]);
    }
}
