<?php

use App\Models\Media;
use App\Models\Session;
use Illuminate\Database\Seeder;

class SessionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image = Media::first();
        Session::create([
            'image_id' => $image->id,
            'short_description' => ' Test',
            'long_description' => ' test test'
        ]);


    }
}
