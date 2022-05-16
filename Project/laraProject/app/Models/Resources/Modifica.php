<?php

namespace App\Models\Resources;

use \Illuminate\Database\Eloquent\Model;
use Thiagoprz\CompositeKey\HasCompositeKey;

class Modifica extends Model{
    use HasCompositeKey;

    protected $table = 'modifica';
    protected $primaryKey = ['utente', 'faq'];
    public $timestamps = false;
}

