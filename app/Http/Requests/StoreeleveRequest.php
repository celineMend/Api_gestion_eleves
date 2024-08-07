<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreeleveRequest extends FormRequest
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
        // return [
        //     'nom' => 'required|string|max:255',
        //     'prenom' => 'required|string|max:255',
        //     'adresse' => 'required|string|max:255',
        //     'telephone' => 'required|string|max:15',
        //     'matricule' => 'required|string|max:50|unique:eleves',
        //     'email' => 'required|string|email|max:255|unique:eleves',
        //     'mot_de_passe' => 'required|string|min:6',
        //     'image' => 'nullable|string|max:255'
        // ];

        return [
            'nom' => ['required', 'string', 'max:30'],
            'prenom' => ['required', 'string', 'max:65'],
           'adresse' => ['required','string', 'max:55'],
            'image' => ['required', 'url'],
            'email' => ['required', 'email', 'unique:eleves,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'telephone' => ['required', 'numeric', 'digits_between:1,15'] ,
            'matricule' => ['required', 'string', 'unique:eleves,matricule'],
        ];
    }
    public function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(
            ['success' => false, 'errors' => $validator->errors()], 422
        ));
    }
}
