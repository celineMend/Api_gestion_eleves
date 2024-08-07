<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateeleveRequest extends FormRequest
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
        $eleveId = $this->route('eleve'); // Assuming the route parameter is named 'eleve'

        return [
            'nom' => ['required', 'string', 'max:30'],
            'prenom' => ['required', 'string', 'max:65'],
            'adresse' => ['required','string', 'max:55'],
            'image' => ['nullable', 'url'],
            'email' => ['required', 'email', 'unique:eleves,email,' . $eleveId],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'telephone' => ['required', 'numeric', 'digits_between:1,15'],
            'matricule' => ['required', 'string', 'unique:eleves,matricule,' . $eleveId],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(
            ['success' => false, 'errors' => $validator->errors()], 422
        ));
    
    }
}
