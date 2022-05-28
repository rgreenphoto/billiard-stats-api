<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedFormats extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('formats')->insert([
            'name' => 'APA League',
        ]);
        DB::table('formats')->insert([
            'name' => 'APA Tournament',
        ]);
        DB::table('formats')->insert([
            'name' => 'BCA League',
        ]);
        DB::table('formats')->insert([
            'name' => 'BCA Tournament',
        ]);
        DB::table('formats')->insert([
            'name' => 'NAPA League',
        ]);
        DB::table('formats')->insert([
            'name' => 'NAPA Tournament',
        ]);
        DB::table('formats')->insert([
            'name' => 'VENA League',
        ]);
        DB::table('formats')->insert([
            'name' => 'Other',
        ]);
    }
}
