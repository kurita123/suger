<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ReviewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'stars'   => 'required|integer|min:1|max:5',
            'comment' => 'required|between:20,200',
        ];
    }
    
    public function messages() {
        return [
            'stars.required'   => '星の数を選んで下さい。',
            'comment.required' => 'コメントは入力必須項目です。',
            'comment.between'  => 'コメントは20文字以上100文字以下で入力して下さい。'
        ];
    }
}
