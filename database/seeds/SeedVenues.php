<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedVenues extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('venues')->insert([
            'name' => 'Felt'
        ]);
        DB::table('venues')->insert([
            'name' => 'Famous Door'
        ]);
        DB::table('venues')->insert([
            'name' => 'Mirage'
        ]);
        DB::table('venues')->insert([
            'name' => 'Mile High Billiards'
        ]);
        DB::table('venues')->insert([
            'name' => 'Greenfields'
        ]);
        DB::table('venues')->insert([
            'name' => 'Zoosters'
        ]);
        DB::table('venues')->insert([
            'name' => 'Rackm'
        ]);
    }
}
