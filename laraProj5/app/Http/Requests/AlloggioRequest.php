<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

// Aggiunti per response JSON
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class AlloggioRequest extends FormRequest{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        // Nella form non mettiamo restrizioni d'uso su base utente
        // Gestiamo l'autorizzazione ad un altro livello
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'dimensione' => 'numeric|min:0|max:99999',
            'citta' => ['required','string','max:255','regex:/^[A-Za-z\-]/u'],
            'via' => ['required','string','max:255','regex:/^[A-Za-z\-]/u'],
            'numCivico' => ['required','string','max:4','regex:/^([1-9]{1})([0-9]{1})?([0-9]{1})?([a-z])?/u'],
            'cap' => ['required','numeric','regex:/^([0-9]{5})/u'],
            'canoneAffitto' => 'required|numeric|min:0|max:99999',
            'utenze' => 'numeric|min:0|max:99999',
            'descrizione' => 'max:255',
            'immagine' => 'image|max:1024'
        ];
    }

    /**
     * Override: response in formato JSON
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
