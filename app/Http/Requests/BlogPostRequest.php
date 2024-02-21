<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
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
        return
        [
            'message'=> 'required|min:5'
        ];
    }


    public function messages(): array
    {
        return
        [
            'message.required' => 'Текст блога обязателен* к заполнению',
            'message.min'      => 'Длина текста блога должен быть не менее 5 символов'
        ];
    }
}
