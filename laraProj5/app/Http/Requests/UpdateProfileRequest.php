<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest {

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
        // Nella form mettiamo restrizioni d'immissione: qui sono elencate le regole per ogni campo
        return[
            'name' => ['required', 'string', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'surname' => ['required', 'string', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'birthplace' => ['required', 'string', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'birthtime' => ['required', 'date', 'before:-18 years'],
            'cf' => ['required', 'alpha_num', 'min:16', 'max:16'],
            'city' => ['required', 'string', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'house-number' => ['required', 'numeric', 'max:1000000'],
            'cap' => ['required', 'string', 'max:5'],
            // bisogna fare controllo mail
            'telephone' => ['numeric', 'min:10'],  //bisogna fare controllo telefono
        ];
    }
}
