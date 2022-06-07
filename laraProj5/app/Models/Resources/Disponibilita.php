<?php

namespace App\Models\Resources;

use \Illuminate\Database\Eloquent\Model;

class Disponibilita extends Model{

    protected $table = 'disponibilita';
    protected $primaryKey = 'id_disponibilita';
    public $timestamps = false;
    protected $fillable = ['alloggio', 'servizio', 'quantita'];
}

