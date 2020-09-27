<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;
use App\Models\Inquiry;
use App\Models\Review;
use Illuminate\Support\Facades\Schema;

class DatabaseTest extends TestCase
{
    use DatabaseTransactions;

    public function testUserDatabase()
    {
        $user = new User();
        $user->name     = '田中太郎';
        $user->email    = 'tanaka@tana.com';
        $user->password = 12345678;
        $saveUser       = $user->save();

        // DBのレコード確認
        $this->assertDatabaseHas('users', [
            'name'  => '田中太郎',
            'email' => 'tanaka@tana.com',
        ]);
    }

    public function testInquiryDatabase()
    {
        $inquiry = new Inquiry();
        $inquiry->user_id = 1;
        $inquiry->inquiry = 'テスト投稿テスト投稿テスト投稿テスト投稿テスト投稿';
        $saveInquiry      = $inquiry->save();

        // DBのレコード確認
        $this->assertDatabaseHas('inquiries', [
            'user_id' => 1,
            'inquiry' => 'テスト投稿テスト投稿テスト投稿テスト投稿テスト投稿'
        ]);
    }

    public function testReviewDatabase()
    {
        $review = new Review();
        $review->recipe_id = 1;
        $review->user_id   = 1;
        $review->stars     = 3;
        $review->comment   = 'テスト投稿テスト投稿テスト投稿テスト投稿テスト投稿';
        $saveReview        = $review->save();

        // DBのレコード確認
        $this->assertDatabaseHas('reviews', [
            'recipe_id' => 1,
            'user_id'   => 1,
            'stars'     => 3,
            'comment'   => 'テスト投稿テスト投稿テスト投稿テスト投稿テスト投稿'
        ]);
    }

    public function testRecipeDatabase()
    {
        $recipe = new Recipe();
        $recipe->user_id  = 1;
        $recipe->recipe   = '卵を8〜12分茹で冷水につける。殻をむき水200mlに塩を入れ冷蔵庫で約3時間寝かせる。
                            お好みの味になったら塩水を抜いて完成！';
        $recipe->c_name   = '塩味茹で卵';
        $recipe->material = '卵好きな数、塩小さじ1、水200ml';
        $recipe->t_suger  = 0.2;
        $recipe->amount   = '1個';
        $recipe->imgpath  = 'yudetamago.jpg';
        $saveRecipe       = $recipe->save();

        // DBのレコード確認
        $this->assertDatabaseHas('recipes', [
            'user_id'  => 1,
            'c_name'   => '塩味茹で卵',
            'material' => '卵好きな数、塩小さじ1、水200ml',
            'amount'   => '1個',
            'imgpath'  => 'yudetamago.jpg'
        ]);

        Recipe::where('c_name','塩味茹で卵')->delete();
    }
}