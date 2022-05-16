<?php

namespace App\Models\Resources;

use \Illuminate\Database\Eloquent\Model;

class DatiPersonali extends Model{
    protected $table = 'dati_personali';
    protected $primaryKey = 'id_dati_personali';
    public $timestamps = false;
}
