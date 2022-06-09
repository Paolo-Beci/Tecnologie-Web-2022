<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'username' => ['max:20', 'unique:utente'],
            'password' => ['required', 'string', 'max:191'],
            'name' => ['required', 'string', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'surname' => ['required', 'string', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'birthplace' => ['required', 'string', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'birthtime' => ['required', 'date', 'before:-18 years'],
            'cf' => ['required', 'alpha_num', 'min:16', 'max:16'],
            'city' => ['required', 'string', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'house-number' => ['required', 'numeric', 'max:1000'],
            'cap' => ['required', 'string', 'regex:/^([0-9]{5})/u', 'max:5'],
            'email' => ['nullable', 'regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', 'max:255'],
            'telephone' => ['nullable', 'regex:/^(\+[0-9]{2}\s?)?[0-9]{3}\s?[0-9]{3}\s?[0-9]{4}$/u', 'max:10']
        ];
    }
}
