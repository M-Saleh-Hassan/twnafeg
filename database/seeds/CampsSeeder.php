<?php

use Illuminate\Database\Seeder;
use App\Models\Camp;
use App\Models\Media;

class CampsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Camp::first()) return;
        $image = Media::first();
        $camp = Camp::create([
            'image_id' => $image->id,
            'short_description' => ' Test',
            'long_description' => ' test test'
        ]);

    }
}
