<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>['required', 'string', 'max:20', 'min:2'],
            'color' => ['required'],
            'description' => ['required', 'string', 'max:50'],
        ];
    }

    public function messages()
    {
        return [
            // 'атрибут.правило' => 'текст с ошибкой'
            'name.required' => 'Название тега обязательно к заполнению',
            'name.max' => 'Название тега не должно превышать 20 символов',
            'description.required' => 'Описание обязательно к заполнению',
            'color.required' => 'Необходимо указать цвет',
        ];
    }
}
