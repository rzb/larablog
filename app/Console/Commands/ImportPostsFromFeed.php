<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportPostsFromFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'larablog:feed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import posts from remote feed';

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
        $response = Http::retry(3)->get(env('ADMIN_REMOTE_FEED_URL'));

        $admin = User::whereEmail(env('ADMIN_EMAIL'))->firstOrFail();

        $admin->posts()->createMany($response->json('data'));
    }
}
