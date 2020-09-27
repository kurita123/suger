<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    // ログイン成功
    public function testLogin()
    {
        // ユーザーを１つ作成
        $user = factory(User::class)->create([
            'name' => '田中',
            'password'  => bcrypt('test1111')
        ]);
        
        // 認証されていない
        $this->assertFalse(Auth::check());
    
        // ログインを実行
        $response = $this->post('login', [
            'email'    => $user->email,
            'password' => 'test1111'
        ]);
        
        // DBのレコード確認
        $this->assertDatabaseHas('users', [
            'name' => '田中',
            'email' => $user->email
        ]);
    
        // 認証されている
        $this->assertTrue(Auth::check());
    
        // ログイン後にトップページにリダイレクトされるのを確認
        $response->assertRedirect('top');
    }
    public function testlogout()
    {
        // ユーザーを１つ作成
        $user = factory(User::class)->create();
    
        // ログイン済みしたことにする
        $this->actingAs($user);
    
        // 認証されていることを確認
        $this->assertTrue(Auth::check());
    
        // ログアウトを実行
        $response = $this->post('logout');
    
        // 認証されていない
        $this->assertFalse(Auth::check());
    
        // ログイン後にホームページにリダイレクトされるのを確認
        $response->assertRedirect('/home');
    }
}