<?php

namespace App\Http\Requests\User;

class UpdateRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */

    public function rules()
    {
        return [
            'name' => 'required|string',
            'surname' => 'nullable|string',
            'patronymic' => 'nullable|string',
            'age' => 'nullable|integer',
            'address' => 'nullable|string',
            'gender' => 'nullable|integer',
            'role' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Це поле повинно бути заповнене',
            'name.string' => 'Імя повинно бути стрічкою',
            'email.required' => 'Це поле повинно бути заповнене',
            'email.string' => 'Пошта повинна бути стрічкою',
            'email.email' => 'Ваша пошта має відповідати формату mail@some.domain',
            'email.unique' => 'Користувач з такою поштою вже існує',
        ];
    }
}
