<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

// Aggiunti per response JSON
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class NewAlloggioRequest extends FormRequest{
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
            'dimensione' => 'integer|numeric|max:99999',//
            'citta' => ['required','string','max:255','|regex:/^[\pL\s\-]+$/u'],//che significa?
            'via' => ['required','string,','max:255','regex:/^[\pL\s\-]+$/u'],
            'numCivico' => 'required|string|max:10',
            'cap' => 'required|string|min:5|max:5',
            'canoneAffitto' => 'required|integer|numeric|min:0|max:99999',
            'utenze' => 'integer|numeric|min:0|max:99999',
            'descrizione' => 'string|max:255',
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
