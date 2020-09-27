<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class SearchTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSearch()
    {
        $this->withoutExceptionHandling();
        $response = $this
            ->actingAs(User::find(1))
            ->get('/search');
        $response->assertStatus(200)
                 ->assertViewIs('search.search');

        $response = $this->get('/guestsearch');
        $response->assertStatus(200)
                 ->assertViewIs('search.guestsearch');
    }
}
