<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();
        Post::create([
            'id'   => 1,
            'name' => 'post1',
        ]);
        Post::create([
            'id'   => 2,
            'name' => 'post2',
        ]);
        Post::create([
            'id'   => 3,
            'name' => 'post3',
        ]);
    }
}
