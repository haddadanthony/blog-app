<?php

namespace App\Console\Commands;

use App\Post;
use Carbon\Carbon;
use DateTime;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class publish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish a post';

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
        $posts = Post::where('status', '=', 'draft')->get();

        $dateTime = new DateTime();
        $dateTime = $dateTime->setTimestamp(time());
        $dateTime = $dateTime->format('Y-m-d H:i:s');

        foreach($posts as $post) {
            if($post->publish_at < $dateTime) {
                $post->status = 'published';
                $post->save();
            }
        }
    }
}
