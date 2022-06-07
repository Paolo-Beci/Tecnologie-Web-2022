<?php

namespace App\Models\Resources;

use \Illuminate\Database\Eloquent\Model;

class Alloggio extends Model{
    protected $table = 'alloggio';
    protected $primaryKey = 'id_alloggio';
    public $timestamps = false;
    protected $guarded = ['id_alloggio'];
    protected $fillable = ['descrizione', 'utenze', 'canone_affitto', 'periodo_locazione', 'genere', 'eta_minima', 'eta_massima', 'dimensione', 'num_posti_letto_tot', 'via', 'citta', 'num_civico', 'cap', 'interno', 'piano', 'data_inserimento_offerta', 'tipologia', 'stato'];

    //relazione One-To-One
    public function alloggioFoto(){
         return $this->hasOne(Foto::class, 'alloggio', 'id_alloggio');
    }
}
