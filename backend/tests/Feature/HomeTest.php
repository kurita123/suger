<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;

class HomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHome()
    {
        // home画面
        $response = $this->get('/home');
        // レシピデータ取得
        $recipe = \App\Models\Recipe::get();
        // レシピデータがあるか
        $this->assertNotNull($recipe);
        // ステータス、表示確認
        $response->assertStatus(200)
                 ->assertViewIs('home')
                 ->assertSee('糖質制限商品')
                 ->assertSee('オススメ商品')
                 ->assertSee('レシピ一覧')
                 ->assertSee('料理名')
                 ->assertSee('糖質量')
                 ->assertSee('評価')
                 ->assertSee('詳細');
    }

    public function testrecipegest()
    {
        // recipegest画面遷移
        $response = $this->post('/recipegest');
        // ステータス、画面表示確認
        $response->assertStatus(200)
                 ->assertViewIs('recipe.recipegest')
                 ->assertSee('糖質制限商品')
                 ->assertSee('オススメ商品')
                 ->assertSee('レビュー評価一覧');   
    }
}
