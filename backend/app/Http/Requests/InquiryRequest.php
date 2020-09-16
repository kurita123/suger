<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InquiryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'    => 'required|max:20',
            'email'   => 'required|email|max:100',
            'comment' => 'required|between:20,400',
        ];
    }
    
    public function messages() {
        return [
            'name.required'    => 'お名前を入力して下さい。',
            'name.max'         => 'お名前は20文字以内で記入して下さい。',
            'email.required'   => 'メールアドレスを入力して下さい。',
            'email.email'      => 'メールアドレスを入力して下さい。',
            'email.max'        => 'メールアドレスの文字数は100文字です。',
            'comment.required' => 'お問い合わせを入力して下さい。。',
            'comment.between'  => 'お問い合わせ内容は20文字以上500文字以内で記入して下さい。',
        ];
    }
}
