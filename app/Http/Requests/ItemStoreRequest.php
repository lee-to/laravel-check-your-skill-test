<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemStoreRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //TODO Validation Задание: Добавить правила валидации для поля title
            // Поле обязательно
            // Строковое
            // Минимам 5 символов
            // Максимум 15 символов
            'title' => 'required|string|min:5|max:15',
        ];
    }
}
