<?php

namespace App\Models\Resources;

use \Illuminate\Database\Eloquent\Model;
use Thiagoprz\CompositeKey\HasCompositeKey;

class Disponibilita extends Model{
    use HasCompositeKey;

    protected $table = 'disponibilita';
    protected $primaryKey = ['alloggio', 'servizio'];
    public $timestamps = false;
}

