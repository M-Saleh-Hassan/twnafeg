<?php

use App\Models\Media;
use App\Models\Training;
use Illuminate\Database\Seeder;

class TrainingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image = Media::first();
        Training::create([
            'image_id' => $image->id,
            'short_description' => ' Test',
            'long_description' => ' test test'
        ]);


    }
}
