<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWeightLogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'date' => 'required',

            'weight' => [
                'required',
                'numeric',
                'between:0,999.9',
                'regex:/^\d{1,3}(\.\d{1})?$/'
            ],

            'calories' => 'required|numeric',
            'exercise_time' => 'required',
            'exercise_content' => 'required|max:120',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を入力してください',

            'weight.required' => '体重を入力してください',
            'weight.numeric' => '数字で入力してください',
            'weight.between' => '4桁までの数字で入力してください',
            'weight.regex' => '小数点は1桁で入力してください',

            'calories.required' => '摂取カロリーを入力してください',
            'calories.numeric' => '数字で入力してください',
            'exercise_time.required' => '運動時間を入力してください',
            'exercise_content.required' => '運動内容を入力してください',
            'exercise_content.max' => '120文字以内で入力してください',
        ];
    }
}
