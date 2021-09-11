<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuizUpdateRequest extends FormRequest
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

    public function rules()
    {
        return [
            'title' => 'required | min:3 | max:200',
            'description' => 'max:1000',
            'finished_at' => 'nullable | after:'.now(),
            'status'=>[
                'required',
                 Rule::in(['publish', 'passive','draft']),
             ],
        ];
    }

    public function attributes()
    {
        return [
            'title'=>'Başlıq',
            'description'=>'Açıqlama',
            'finished_at' => 'Bitiş Tarixi'
        ];
    }
}
