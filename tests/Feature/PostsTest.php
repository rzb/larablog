<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Http\Requests\StorePost;

class PostsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test **/
    public function a_guest_cannot_create_a_post(): void
    {
        $attributes = Post::factory()->authorless()->make()->only([
            'title', 'description', 'publication_date',
        ]);

        $this->post(route('my-posts.store'), $attributes);

        $this->assertDatabaseMissing('posts', $attributes);
    }

    /** @test **/
    public function a_user_can_create_a_post(): void
    {
        $user = User::factory()->create();
        $attributes = Post::factory()->authorless()->make()->only([
            'title', 'description', 'publication_date',
        ]);

        $this->actingAs($user)
             ->post(route('my-posts.store'), $attributes);

        $this->assertDatabaseHas('posts', $attributes);
    }

    /** @test **/
    public function a_user_can_see_only_his_own_posts_on_his_dashboard(): void
    {
        $userPost = Post::factory()->create();
        $someoneElsesPost = Post::factory()->create();

        $response = $this->actingAs($userPost->author)
                         ->get(route('my-posts.index'));
    
        $response
            ->assertStatus(200)
            ->assertSee($userPost->title)
            ->assertDontSee($someoneElsesPost->title);
    }

    /** @test */
    public function post_store_is_validated_using_a_form_request()
    {
        // By making sure that the form request is being used, we don't 
        // need to write a test for every single validation rule.
        // Laravel already takes care of testing the rules.
        // All we need to to is assert that we are using
        // the proper rules. @see tests\Unit\StorePost.
        $this->assertActionUsesFormRequest(
            PostController::class,
            'store',
            StorePost::class
        );
    }
}
