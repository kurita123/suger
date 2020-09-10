<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'stock' => 'required|integer|between:1,30',
            'datetime' => 'required|after:now',
        ];
    }

    public function messages()
    {
        return [
            'stock.required' => '1~30の間で入力して下さい。',
            'datetime.required' => '日付を選択して下さい。',
            'datetime.after' => '明日以降の日付を選択して下さい。'
        ];
    }
}
