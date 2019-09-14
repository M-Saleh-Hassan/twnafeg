<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(WebSiteTextSeeder::class);
        $this->call(CampsSeeder::class);
        $this->call(TrainingsSeeder::class);
        $this->call(SessionsSeeder::class);
    }
}
