<?php

namespace App\Models\Resources;

use \Illuminate\Database\Eloquent\Model;

class Messaggio extends Model{

    protected $table = 'messaggio';
    protected $primaryKey = 'id_messaggio';
    public $timestamps = false;

    protected $fillable = [
        'data_invio', 'contenuto', 'mittente', 'destinatario', 'alloggio'
    ];
}