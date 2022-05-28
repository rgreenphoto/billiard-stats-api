<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedRackTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rack_types')->insert([
            'name' => 'Wood'
        ]);
        DB::table('rack_types')->insert([
            'name' => 'Plastic'
        ]);
        DB::table('rack_types')->insert([
            'name' => 'Magic Rack'
        ]);
    }
}
