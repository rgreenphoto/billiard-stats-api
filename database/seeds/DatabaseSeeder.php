<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('SeedFormats');
        $this->call('SeedGameTypes');
        $this->call('SeedRackTypes');
        $this->call('SeedTableTypes');
        $this->call('SeedVenues');
        $this->call('SeedUsers');
    }
}
