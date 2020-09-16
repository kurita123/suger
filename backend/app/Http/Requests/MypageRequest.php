<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MypageRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'c_name'   => 'required|max:50',
            't_suger'  => 'required',
            'material' => 'required',
            'amount'   => 'required',
            'recipe'   => 'required|min:50|max:2000',
            'imgpath'  => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
        ];
    }
    
    public function messages() {
        return [
            'c_name.required'   => '料理名を記入して下さい。',
            'c_name.max'        => '料理名を50文字以内で記入して下さい。',
            't_suger.required'  => '総糖質量を記入して下さい。',
            'material.required' => '食材＆調味料を記入して下さい。',
            'amount.required'   => '1人前の量を記入して下さい。',
            'recipe.required'   => '作り方を記入して下さい。',
            'recipe.min'        => '作り方を50文字以上で記入して下さい。',
            'recipe.max'        => '作り方を2000文字以内で記入して下さい。',
            'imgpath.required'  => '画像を選んで下さい',
            'image'             => '指定されたファイルが画像ではありません。',
            'mimes'             => '指定された拡張子（JPEG/PNG/JPG/GIF）ではありません。',
            'max'               => '１Ｍを超えています。',
        ];
    }

}
