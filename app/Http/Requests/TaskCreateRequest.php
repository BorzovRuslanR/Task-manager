<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required', 'string', 'max:255', 'min:2'],
            'preview'=>['required', 'string', 'max:255'],
            'text'=>['required', 'string', 'max:5000'],
            'priority'=>['nullable', 'boolean'],
            'file'=>['required', 'image', 'max:10240'],
        ];
    }

    public function messages()
    {
        return [
            // 'атрибут.правило' => 'текст с ошибкой'
            'name.required' => 'Название задачи обязательно к заполнению',
            'preview.required' => 'Краткое описание обязательно к заполнению',
            'text.required' => 'Подробное описание обязательно к заполнению',
            'file.required' => 'Картинка обязательна к загрузке'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'название задачи',
            'preview' => 'краткое описание задачи',
            'file' => 'картинка'
        ];
    }
}
