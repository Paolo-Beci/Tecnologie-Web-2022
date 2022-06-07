<?php

namespace App\Models\Resources;

use \Illuminate\Database\Eloquent\Model;

class Modifica extends Model{

    protected $table = 'modifica';
    protected $primaryKey = 'id_modifica';
    public $timestamps = false;
    protected $guarded = ['id_modifica'];

    protected $fillable = ['utente', 'faq', 'data_modifica'];
}

