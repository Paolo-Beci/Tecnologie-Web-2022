<?php

namespace App\Models\Resources;

use \Illuminate\Database\Eloquent\Model;
use Thiagoprz\CompositeKey\HasCompositeKey;

class Interazione extends Model{
    use HasCompositeKey;

    protected $table = 'interazione';
    protected $primaryKey = ['utente', 'alloggio'];
    public $timestamps = false;
    protected $fillable = ['utente', 'alloggio', 'data_interazione'];
}
