<?php

namespace App\Models\Resources;

use \Illuminate\Database\Eloquent\Model;
use Thiagoprz\CompositeKey\HasCompositeKey;

class Messaggi extends Model{
    use HasCompositeKey;

    protected $table = 'messaggi';
    protected $primaryKey = ['mittente', 'destinatario', 'alloggio'];
    public $timestamps = false;
}
