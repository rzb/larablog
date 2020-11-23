<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Client\ConnectionException;
use App\Exceptions\RemoteFeedUrlNotResolved;
use App\Exceptions\AdminNotFound;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Validator;
use Log;

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
        $admin = $this->getAdminUser();

        foreach ($this->fetchPosts() as $post) {
            $validator = Validator::make($post, Post::getRulesForStoring());

            if ($validator->fails()) {
                Log::error('Could not import Post because validation failed.', $validator->errors()->all());
                
                continue;
            }

            $admin->posts()->create($post);
        }
    }

    protected function getAdminUser(): User
    {
        $admin = User::admin()->first();

        if (! $admin) {
            throw new AdminNotFound;
        }

        return $admin;
    }

    protected function fetchPosts(): Array
    {
        try {
            $response = Http::retry(3)->get(env('ADMIN_REMOTE_FEED_URL'));
        } catch (ConnectionException $e) {
            throw new RemoteFeedUrlNotResolved;
        }

        return $response->json('data');
    }
}
