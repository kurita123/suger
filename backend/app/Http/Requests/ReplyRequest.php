<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReplyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'reply'  => 'required|max:1000',
        ];
    }
    
    public function messages() {
        return [
            'reply.required' => '返信内容を1000文字以内で記入して下さい。',
        ];
    }
}
