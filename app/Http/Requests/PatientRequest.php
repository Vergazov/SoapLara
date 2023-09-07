<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'givenName' => ['required', 'string'],
            'familyName' => ['required', 'string'],
            'birthDate' => ['required','date'],
            'IdPatientMIS' => ['required', 'integer'],
            'sex' => ['required', 'integer'],
        ];
    }

    public function messages()
    {
        return[
            'givenName.required' => 'Поле "Имя" должно быть заполнено',
            'familyName.required' => 'Поле "Фамилия" должно быть заполнено',
            'birthDate.required' => 'Поле "Дата рождения" должно быть заполнено',
            'birthDate.date' => 'Введите корректную дату рождения',
            'IdPatientMIS.required' => 'Поле "ID пациента в МИС Медтайм" должно быть заполнено',
            'IdPatientMIS.integer' => 'Поле "ID пациента в МИС Медтайм" должно быть в формате числа',
            'sex.required' => 'Поле "Пол" должно быть заполнено',
        ];
    }
}
