<?php

namespace App\Models\Resources;

use \Illuminate\Database\Eloquent\Model;

class Utente extends Model{
    protected $table = 'utente';
    protected $primaryKey = 'username';
    public $timestamps = false;
}
