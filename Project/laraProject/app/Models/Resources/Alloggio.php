<?php

namespace App\Models\Resources;

use \Illuminate\Database\Eloquent\Model;

class Alloggio extends Model{
    protected $table = 'alloggio';
    protected $primaryKey = 'id_alloggio';
    public $timestamps = false;

    //relazione One-To-Many
    public function alloggioFoto(){
         return $this->hasMany(Foto::class, 'alloggio', 'id_alloggio');
    }
}
