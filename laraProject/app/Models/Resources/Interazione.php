<?php

namespace App\Models\Resources;

use \Illuminate\Database\Eloquent\Model;

class Interazione extends Model{

    protected $table = 'interazione';
    protected $primaryKey = 'id_interazione';
    public $timestamps = false;
    protected $guarded = ['id_interazione'];

    protected $fillable = ['utente', 'alloggio', 'data_interazione'];
}
