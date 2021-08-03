<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Console\Command;

class SampleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sample';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Resetting database');
        $this->callSilent('db:seed');

        $this->info('Getting post 1');
        $post = Post::find(1);

        $this->info('> Adding laravel tag to post 1');
        $tag = new Tag();
        $tag->name = "Laravel";
        $post->tags()->save($tag);

        $this->info('> Adding multiple tags to post 1');
        $tag1 = new Tag();
        $tag1->name = "PHP";

        $tag2 = new Tag();
        $tag2->name = "jQuery";

        $post->tags()->saveMany([$tag1, $tag2]);

        dump($post->tags->pluck('name')->join(', '));

        $this->info('Syncing tags with post 1');
        $post->tags()->sync([$tag1->id, $tag2->id]);

        dump($post->tags->pluck('name')->join(', '));

        $this->info('Getting video 1');
        $video = Video::find(1);

        $this->info('> Adding tag madona to video 1');
        $tag = new Tag();
        $tag->name = "Madona";
        $video->tags()->save($tag);
        $video->tags()->save($tag1);
        dump($video->tags->pluck('name')->join(', '));

        $this->info('Doing the reverse');

        $tagPHP = Tag::firstWhere('name', 'PHP');
        dump($tagPHP->posts->pluck('name')->join(', '));

        $tagMadona = Tag::firstWhere('name', 'Madona');
        dump($tagMadona->videos->pluck('name')->join(', '));

        dump($tag1->commentable()->pluck('name')->join(', '));
        return 0;
    }
}
