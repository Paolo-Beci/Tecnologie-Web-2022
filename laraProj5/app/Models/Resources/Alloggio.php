<?php

namespace App\Models\Resources;

use \Illuminate\Database\Eloquent\Model;

class Alloggio extends Model{
    protected $table = 'alloggio';
    protected $primaryKey = 'id_alloggio';
    public $timestamps = false;
    protected $guarded = ['id_alloggio'];

    //relazione One-To-One
    public function alloggioFoto(){
         return $this->hasOne(Foto::class, 'alloggio', 'id_alloggio');
    }
}
