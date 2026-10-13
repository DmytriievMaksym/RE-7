<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ParticipationRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'author' => ['required','string','max:255'],
            'email' => ['required','email'],
            'phone' => ['nullable', 'regex:/^\d{10}$/'],
            'model' => ['required','string'],
            'category' => ['required', 'string', 'in:Бронетехніка,Авіація,Флот,Діорами'],
            'scale' => ['required', 'regex:/^1:\d{2,3}$/'],
            /* Додати завантаження зображень*/
        ];
    }

    public function messages(): array{
        return [
            'author.required' => 'Поле "Ім\'я" не може бути порожнім.',
            'email.required' => 'Поле "Email" не може бути порожнім.',
            'email.email' => 'Email введено некоректно.',
            'phone.regex' => 'Неправильно введений номер, приклад: 0671234567.',
            'model.required' => 'Поле "Назва моделі" не може бути порожнім.',
            'category.required' => 'Оберіть одну з запропонованих категорій.',
            'scale.required' => 'Поле "Масштаб" не може бути порожнім.',
            'scale.regex' => 'Неправильно введений масштаб, приклад: 1:35.',
        ];
    }
}
