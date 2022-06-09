<?php

namespace App\Models\Resources;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {

    protected $table = "utente";

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'ruolo', 'dati_personali'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'username', 'password'
    ];

    public $timestamps = false;

    public function hasRole($role) {
        $role = (array)$role;
        return in_array($this->ruolo, $role);
    }
}
