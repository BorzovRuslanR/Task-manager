<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'coment' => ['required', 'string', 'max:500', 'min:2']
        ];
    }

    public function messages()
    {
        return [
            // 'атрибут.правило' => 'текст с ошибкой'
            'coment.required' => 'Комментарий не может быть пустым',
            'coment.min' => 'Комментарий не может быть короче 2х символов',
            'coment.max' => 'Комментарий не может быть длиннее 500 символов'
        ];
    }

    public function attributes()
    {
        return [
            'coment' => 'Комментарий',

        ];
    }
}
