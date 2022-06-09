<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class NewUserRequest extends FormRequest {

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
            'sign-up-username' => ['required', 'string', 'unique:utente,username', 'min:8', 'max:20'],
            'sign-up-password' => ['required', 'string', 'max:191', 'confirmed'],
        ];
    }

    protected function failedValidation(Validator $validator) {
        Session::put('active-form', 'sign-up');
    }

}
