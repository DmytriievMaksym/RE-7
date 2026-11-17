<?php

namespace App\Http\Requests;

use App\Enums\CategoryEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class ModelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required','string'],
            'nominations' => ['required','array','min:1'],
            'nominations.*' => ['string', 'exists:nominations,key'],
            'scale' => ['required','regex:/^1:\d{2,3}$/'],
            'author_id' => ['required','string'],
        ];
    }

    public function messages(): array{
        return [
            'author_id.required' => 'Поле "ID автора" не може бути порожнім.',
            'name.required' => 'Поле "Назва моделі" не може бути порожнім.',
            'nominations.required' => 'Оберіть мінімум одну з запропонованих категорій.',
            'scale.required' => 'Поле "Масштаб" не може бути порожнім.',
            'scale.regex' => 'Неправильно введений масштаб, приклад: 1:35.',
        ];
    }
}
