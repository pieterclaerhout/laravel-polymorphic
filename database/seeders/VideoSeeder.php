<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::truncate();
        Video::create([
            'id'   => 1,
            'name' => 'video1',
        ]);
        Video::create([
            'id'   => 2,
            'name' => 'video2',
        ]);
        Video::create([
            'id'   => 3,
            'name' => 'video3',
        ]);
    }
}
