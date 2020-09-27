<?php

namespace Tests\Requests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Requests\InquiryRequest;
use Illuminate\Support\Facades\Validator;

class InquiryRequestTest extends TestCase
{
    /**
     * カスタムリクエストのバリデーションテスト
     *
     * @param string 項目名
     * @param string 値
     * @param boolean 期待値(true:バリデーションOK、false:バリデーションNG)
     * @dataProvider dataproviderExample
     */
    public function testExample($item, $data, $expect)
    {
        //入力項目（$item）とその値($data)
        $dataList = [$item => $data];

        $request = new InquiryRequest();
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
            // nameバリデーション
            'name'    => ['required', '田中',true],
            'name'    => ['required', '', false],
            //21文字の文字列を作成
            'name'    => ['max', str_repeat('a', 21), false],
            // emailバリデーション
            'email'   => ['required', 'test@test.com',true],
            'email'   => ['email', 'test',false],
            'email'   => ['required', '', false],
            // commentバリデーション
            'comment' => ['required', 'テスト投稿テスト投稿テスト投稿テスト投稿テスト投稿',true],
            'comment' => ['required', '', false],
            //19文字の文字列を作成
            'comment' => ['between', str_repeat('a', 19), false],
            //401文字の文字列を作成
            'comment' => ['between', str_repeat('a', 401), false],
        ];
        
    }

}
