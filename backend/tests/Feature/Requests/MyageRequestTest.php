<?php

namespace Tests\Requests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Requests\MypageRequest;
use Illuminate\Support\Facades\Validator;

class MypageRequestTest extends TestCase
{
    /**
     * カスタムリクエストのバリデーションテスト
     *
     * @dataProvider dataproviderExample
     */
    public function testExample($item, $data, $expect)
    {
        //入力項目（$item）とその値($data)
        $dataList = [$item => $data];

        $request = new MypageRequest();
        //フォームリクエストで定義したルールを取得
        $rules = $request->rules();
        //Validatorファサードでバリデーターのインスタンスを取得、その際に入力情報とバリデーションルールを引数で渡す
        $validator = Validator::make($dataList, $rules);
        //入力情報がバリデーショルールを満たしている場合はtrue、満たしていな場合はfalseが返る
        $result = $validator->passes();
        //期待値($expect)と結果($result)を比較
        $this->assertEquals($expect, $result);
    }

    public function dataproviderExample()
    {
        return [
            // c_nameバリデーション
            'c_name'     => ['required', '卵焼き',true],
            'c_name'     => ['required', '', false],
            // 51文字の文字列を作成
            'c_name'     => ['max', str_repeat('a', 51), false],
            // t_sugerバリデーション
            't_suger'    => ['required', 12,true],
            't_suger'    => ['email', '12',false],
            't_suger'    => ['required', '', false],
            // materialバリデーション
            'material'   => ['required', 'テスト投稿',true],
            'material'   => ['required', '', false],
            // amountバリデーション
            'amount'     => ['required', 100,true],
            'amount'     => ['required', '', false],
            'amount'     => ['required', '100', false],
            // recipeバリデーション
            'recipe'     => ['required', '茹で卵',true],
            'recipe'     => ['required', '', false],
            // 2001文字の文字列を作成
            'recipe'     => ['max', str_repeat('a', 2001), false],
            // 49文字の文字列を作成
            'recipe'     => ['min', str_repeat('a', 49), false],
            // imgpathバリデーション
            'imgpath'    => ['required', 'yudetamago.jpg',true],
            'imgpath'    => ['required', '', false],
            'imgpath'    => ['image', '', false],
            'imgpath'    => ['mimes:jpeg,png,jpg,gif', 'yudetamago.jpg', true,],
            'imgpath'    => ['mimes:jpeg,png,jpg,gif', 'yudetamago.jpeg', true,],
            'imgpath'    => ['mimes:jpeg,png,jpg,gif', 'yudetamago.jpg', true,],
            'imgpath'    => ['mimes:jpeg,png,jpg,gif', 'yudetamago.gif', true,],
            'imgpath'    => ['mimes:jpeg,png,jpg,gif', 'yudetamago', false,],
        ];
        
    }

}
