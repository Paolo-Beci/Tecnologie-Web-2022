<?php

namespace App\Models\Resources;

use \Illuminate\Database\Eloquent\Model;

class Servizio extends Model{
    protected $table = 'servizio';
    protected $primaryKey = 'nome_servizio';
    public $timestamps = false;
    protected $fillable = ['alloggio', 'servizio', 'quantita'];
    public $incrementing = false;
}
