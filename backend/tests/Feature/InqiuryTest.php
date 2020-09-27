<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class InqiuryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testInquiry()
    {
        $this->withoutExceptionHandling();
        // ログイン済みからのアクセス
        $response = $this
            ->actingAs(User::find(1))
            ->get('inquiry/inquiry');
        $response->assertStatus(200);
    }

    public function testConfurm()
    {
        // ログイン済みからのアクセス　
        $response = $this
            ->actingAs(User::find(1))
            // 必須項目入力
            ->post('inquiry/inquiryconfirm',[
                'name' => '山田',
                'email' => 'test@gmail.com',
                'comment' => 'テスト投稿テスト投稿テスト投稿テスト投稿テスト投稿'
            ]);
        $response->assertStatus(200);
    }

    public function testMail()
    {
        $this->withoutExceptionHandling();
        Mail::fake();
        $email = 'test@gmail.com';
        // 任意の実際のリクエスト処理
        $response = $this
            ->actingAs(User::find(1))
            ->post(
            "inquiry/inquirycomplete",
            [
                'name' => '山田',
                'email' => 'test@gmail.com',
                'comment' => 'テスト投稿テスト投稿テスト投稿テスト投稿テスト投稿',
            ]
        );

        // 2回送信されたことをアサート
        Mail::assertSent(ContactMail::class,2);
    }
}
