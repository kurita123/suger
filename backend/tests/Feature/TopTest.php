<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;

class TopTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testTop()
    {
        $user = factory(User::class)->create();
        $response = $this
            ->actingAs($user)
            ->get('/top');
        $response->assertStatus(200)
            ->assertViewIs('top')
            ->assertSee('レシピ一覧');
        $this->artisan('migrate:fresh', ['--seed' => true]);
        $this->artisan('migrate:refresh');
        $this->artisan('db:seed');
    }
}
