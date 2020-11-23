<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use App\Exceptions\AdminNotFound;
use App\Exceptions\RemoteFeedUrlNotResolved;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Log;

class ImportPostsFromFeedTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_imports_posts_from_feed(): void
    {
        $this->fakeHttpResponse();
        $this->seed();

        $this->artisan('larablog:feed');

        $this->assertCount(1, Post::all());
    }

    /** @test */
    public function it_stores_the_posts_under_a_designated_admin_user(): void
    {
        $this->fakeHttpResponse();
        $this->seed();
        $admin = User::admin()->first();

        $this->artisan('larablog:feed');

        $this->assertTrue($admin->posts()->whereTitle('Dolor facere rerum quia et non ipsum odio occaecati.')->exists());
    }

    /** @test */
    public function it_throws_an_exception_when_admin_user_is_missing(): void
    {
        $this->expectException(AdminNotFound::class);
        $this->fakeHttpResponse();

        $this->artisan('larablog:feed');
        
    }

    /** @test */
    public function it_throws_an_exception_when_remote_host_cannot_be_resolved(): void
    {
        config(['ADMIN_REMOTE_FEED_URL' => null]);
        $this->expectException(RemoteFeedUrlNotResolved::class);
        $this->seed();

        $this->artisan('larablog:feed');
    }

    /** @test */
    public function it_logs_post_validation_errors(): void
    { 
        $this->fakeHttpResponse([[
            'title'            => null,
            'description'      => null,
            'publication_date' => 'not-a-date',
        ]]);
        $this->seed();
        Log::shouldReceive('error')->once()->withSomeOfArgs('Could not import Post because validation failed.');

        $this->artisan('larablog:feed');
    }

    private function fakeHttpResponse(array $data = [])
    {
        if (! $data) {
            $data[] = [
                'title'            => 'Dolor facere rerum quia et non ipsum odio occaecati.',
                'description'      => 'Tenetur aut beatae blanditiis error non aut quaerat saepe et. Quia temporibus qui praesentium corrupti ullam dolorum voluptatem odit vero. Consequuntur recusandae voluptas consectetur error velit eos tempore. Eum sit incidunt qui et culpa explicabo itaque repellat. Sed magnam rerum. Accusamus sit sint non quia quis adipisci alias consequuntur blanditiis.',
                'publication_date' => '2020-11-24 03:16:28',
            ];
        }

        Http::fake([
            '*' => Http::response('{"data":' . json_encode($data) . '}')
        ]);
    }
}
