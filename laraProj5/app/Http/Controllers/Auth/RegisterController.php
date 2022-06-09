<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Resources\DatiPersonali;
use App\Models\Resources\User;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    //protected $redirectTo = '/home';
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
            //no profile-picture validation
            'name' => ['required', 'string', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'surname' => ['required', 'string', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'birthplace' => ['required', 'string', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'birthtime' => ['required', 'date', 'before:-18 years', 'max:10'],
            //no gender validation
            'cf' => ['required', 'string', 'min:16', 'max:16'],
            'city' => ['required', 'string', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'house-number' => ['required', 'numeric', 'max:1000'],
            'cap' => ['required', 'string', 'regex:/^([0-9]{5})/u', 'max:5'],
            'email' => ['nullable', 'regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/'],
            'telephone' => ['nullable', 'regex:/^(\+[0-9]{2}\s?)?[0-9]{3}\s?[0-9]{3}\s?[0-9]{4}$/u', 'max:10']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $username = Session::get('sign-up-username');
        $password = Session::get('sign-up-password');
        $role = Session::get('role');

        Session::forget(['sign-up-username', 'sign-up-password', 'role']);

        $id_dati_personali = DatiPersonali::create([
            'cellulare' => $data['telephone'],
            'via' => $data['street'],
            'citta' => $data['city'],
            'num_civico' => $data['house-number'],
            'cap' => $data['cap'],
            'nome' => $data['name'],
            'cognome' => $data['surname'],
            'data_nascita' => $data['birthtime'],
            'luogo_nascita' => $data['birthplace'],
            'sesso' => $data['gender'],
            'mail' => $data['email'],
            'codice_fiscale' => $data['cf']
        ])->id_dati_personali;

        return User::create([
            'username' => $username,
            'password' => Hash::make($password),
            'ruolo' => $role,
            'dati_personali' => $id_dati_personali
        ]);

    }

    protected function registered(Request $request, $user) {
        Auth::logout();
    }

}
