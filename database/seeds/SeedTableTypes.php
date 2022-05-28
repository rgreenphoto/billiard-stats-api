<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedTableTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('table_types')->insert([
            'name' => 'Diamond 7',
            'size' => '7'
        ]);
        DB::table('table_types')->insert([
            'name' => 'Diamond 9',
            'size' => '9'
        ]);
        DB::table('table_types')->insert([
            'name' => 'Brunswick 9',
            'size' => '9'
        ]);
        DB::table('table_types')->insert([
            'name' => 'Valley 7',
            'size' => '7'
        ]);
    }
}
