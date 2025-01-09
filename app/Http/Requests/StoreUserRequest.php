<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Só valida se o usuário tiver permissão de fazer essa ação
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    // Vou passar aqui, tudo que quero validar 
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => [
               'required',
                'email',
                'unique:users,email',  
            ],
            'password'=> [
                'required',
                'min:6',
                'max:20',
            ]
        ];
    }
}
