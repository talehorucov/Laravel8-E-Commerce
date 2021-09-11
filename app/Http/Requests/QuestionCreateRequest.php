<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'question' => 'required | min:3',
            'image' => 'image | nullable | max:1024 | mimes:jpg,jpeg,png',
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',
            'correct_answer' => [
                'required',
                 Rule::in(['answer1', 'answer2','answer3', 'answer4']),
             ],
        ];
    }

    public function attributes()
    {
        return [
            'question'=>'Sual',
            'image'=>'Şəkil',
            'answer1' => '1. Cavab',
            'answer2' => '2. Cavab',
            'answer3' => '3. Cavab',
            'answer4' => '4. Cavab',
            'correct_answer' => 'Düzgün Cavab',
        ];
    }
}
