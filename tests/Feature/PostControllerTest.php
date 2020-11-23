<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;

class PostControllerTest extends TestCase
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
}
