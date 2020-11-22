<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class PostControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test **/
    public function a_guest_cannot_create_a_post(): void
    {
        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'publication_date' => now(),
        ];

        $this->post(route('my-posts.store'), $attributes);

        $this->assertDatabaseMissing('posts', $attributes);
    }

    /** @test **/
    public function a_user_can_create_a_post(): void
    {
        $user = User::factory()->create();
        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'publication_date' => now(),
        ];

        $this->actingAs($user)
             ->post(route('my-posts.store'), $attributes);

        $this->assertDatabaseHas('posts', $attributes);
    }
}
