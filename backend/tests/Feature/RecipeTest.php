<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Support\Facades\Schema;

class RecipeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRecipe()
    {
        $this->withoutExceptionHandling();
        $response = $this
            ->actingAs(User::find(1))
            ->get('/recipe');
        // ステータス、表示確認
        $response->assertStatus(200)
                 ->assertViewIs('recipe.recipe');

        $this->assertTrue(
            Schema::hasColumns('recipes', [
                'id', 'recipe', 'user_id','c_name','material','t_suger','amount','imgpath','evaluation'
            ]),
            2
        );
    }

    public function testReview()
    {
        $response = $this
            ->actingAs(User::find(1))
            ->get('/review');
        // ステータス
        $response->assertStatus(302);
    }
}