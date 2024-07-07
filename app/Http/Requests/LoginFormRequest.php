<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
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
            'email'=>'required|email|exists:users,email',
            'password'=>'required',
        ];
    }

    public function messages(){
        return[
            'email.required' => 'Veuillez entrer votre addresse email',
            'email.email' => 'Veuillez entrer une addresse email valide',
            'email.exists' => 'Aucun compte ne correspond a cet adresse email',
            'password.required' => 'Veuillez entrer votre mot de passe',
        ];
    }

    
}
