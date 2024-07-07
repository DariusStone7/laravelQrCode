<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployerFormRequest extends FormRequest
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
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email|unique:employers,email',
            'matricule'=>'required|unique:employers,matricule',
            'card_number'=>'required|unique:employers,card_number',
            'address'=>'required',
            'sexe'=>'required',
            'birthday'=>'required',
        ];
    }

    public function messages(){
        return[
            'email.required' => 'Veuillez entrer une addresse email',
            'email.email' => 'Veuillez entrer une addresse email valide',
            'email.unique' => 'Adresse email deja existante',
            'firstname.required' => 'Veuillez entrer une nom',
            'lastname.required' => 'Veuillez entrer une prenom',
            'sexe.required' => 'Veuillez choisir un sexe',
            'sexe.birthday' => 'Veuillez choisir un date de naissance',
            'matricule.required' => 'Veuillez entrer un matricule',
            'card_number.required' => 'Veuillez entrer un numéro de carte',
            'matricule.unique' => 'Matricule déja existant',
            'card_number.unique' => 'Numéro de carte déja existante',

        ];
    }
}
