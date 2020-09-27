<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

class MypageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMypage()
    {
        // 必要データ指定
        $response = $this
            ->actingAs(User::find(1))
            ->post('/mypage',[
                'user_id' => 1,
            ]);
        // データがあるか確認
        $this->assertDatabaseHas('recipes', [
            'user_id' => 1
        ]);
        // viewの確認
        $response->assertStatus(200)
                 ->assertViewIs('mypage.mypage')
                 ->assertSee('糖質制限商品')
                 ->assertSee('の投稿レシピ一覧')
                 ->assertSee('料理名')
                 ->assertSee('画像')
                 ->assertSee('糖質量')
                 ->assertSee('評価')
                 ->assertSee('詳細');
    }

    public function testrecipeuser()
    {
        $this->withoutExceptionHandling();
        // 必要データ指定
        $response = $this
            ->actingAs(User::find(1))
            ->post('/recipeuser',[
                'id' =>1,
                'user_id'=>1
            ]);
        // データがあるか確認
        $this->assertDatabaseHas('recipes', [
            'id' => 1
        ]);
        $response->assertStatus(200)
                 ->assertViewIs('mypage.recipeuser')
                 ->assertSee('糖質制限商品')
                 ->assertSee('さんのレシピ')
                 ->assertSee('糖質量')
                 ->assertSee('評価')
                 ->assertSee('削除')
                 ->assertSee('変更');
    }

    public function testrecipechange()
    {
        // 必要データ指定、ログイン中
        $response = $this
            ->actingAs(User::find(1))
            ->get('/recipechange',[
                'id' =>1,
                'user_id' =>1,
            ])
            ->assertStatus(200)
            ->assertViewIs('mypage.recipechange');
        // データがあるか確認
        $this->assertDatabaseHas('recipes', [
            'id' => 1
        ]);
        
    }

    public function testchangecomplete()
    {
        $response = $this
            ->actingAs(User::find(1))
            ->post('/changecomplete',[
                'id' =>1,
                'user_id' =>1,
            ])
            ->assertStatus(302);
    }

    public function testdelete()
    {
        // ログイン中
        $response = $this->actingAs(User::find(1));
        // 認証確認
        $this->assertTrue(Auth::check());
        // faker自動生成
        $recipe = factory(Recipe::class)->create();
        $recipeId = $recipe->id;
        //　送信パス
        $formpath = '/delete';
        // 削除データ
        $deletedata = ['id'=>$recipeId];
        // 削除実施
        $response = $this->from($formpath)->post($formpath, $deletedata);
        // DBのレコード確認
        $this->assertDatabaseMissing('recipes', [
            'id' => $recipeId,
        ]);
        // エラーメッセージがないこと
        $response->assertSessionHasNoErrors();
        $response->assertStatus(200);
        // delete viewである事
        $response->assertViewIs('mypage.delete');
        // 削除結果ページが出力されていること
        $response->assertSeeText('削除しました');
        $response->assertStatus(200);
    }
}
