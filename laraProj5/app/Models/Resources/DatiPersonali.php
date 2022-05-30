<?php

namespace App\Models\Resources;

use \Illuminate\Database\Eloquent\Model;

class DatiPersonali extends Model{
    protected $table = 'dati_personali';
    protected $primaryKey = 'id_dati_personali';
    public $timestamps = false;

    protected $fillable = [
        'id_foto_profilo', 'cellulare', 'via', 'citta', 'num_civico', 'cap', 'nome', 'cognome',
        'data_nascita', 'luogo_nascita', 'sesso', 'mail', 'codice_fiscale'
    ];
    
}
