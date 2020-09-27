<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class PostTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPost()
    {
        $response = $this
            ->actingAs(User::find(1))
            ->get('/post');
        $response->assertStatus(200)
                 ->assertViewIs('post.post');;
    }

    public function testComplete()
    {
        $response = $this
            ->actingAs(User::find(1))
            ->post('/postcomplete');
        $response->assertStatus(302);
    }
}
