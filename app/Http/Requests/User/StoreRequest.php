<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'surname' => 'nullable|string',
            'lastname' => 'nullable|string',
            'email' => 'required|string|unique:users,email|email',
            'password' => 'required|string|confirmed',
            'age' => 'nullable|integer',
            'address' => 'nullable|string',
            'gender' => 'nullable|integer',
        ];
    }
}
