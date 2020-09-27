<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InquiryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => 'required|max:20',
            'email'   => 'required|email',
            'comment' => 'required|between:20,400',
        ];
    }
    
    public function messages() {
        return [
            'name.required'    => 'お名前を入力して下さい。',
            'name.max'         => 'お名前は20文字以内で記入して下さい。',
            'email.required'   => 'メールアドレスを入力して下さい。',
            'email.email'      => 'メールアドレスを入力して下さい。',
            'comment.required' => 'お問い合わせを入力して下さい。。',
            'comment.between'  => 'お問い合わせ内容は20文字以上500文字以内で記入して下さい。',
            'email.required'    => 'お名前を入力して下さい。',
            'name.max'         => 'お名前は20文字以内で記入して下さい。',
            'email.required'   => 'メールアドレスを入力して下さい。',
            'email.email'      => 'メールアドレスを入力して下さい。',
            'comment.required' => 'お問い合わせを入力して下さい。。',
            'comment.between'  => 'お問い合わせ内容は20文字以上500文字以内で記入して下さい。',
        ];
    }
}
