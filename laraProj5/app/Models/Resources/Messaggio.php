<?php

namespace App\Models\Resources;

use \Illuminate\Database\Eloquent\Model;
use Thiagoprz\CompositeKey\HasCompositeKey;

class Messaggio extends Model{
    use HasCompositeKey;

    protected $table = 'messaggio';
    protected $primaryKey = ['mittente', 'destinatario', 'alloggio'];
    public $timestamps = false;

    protected $fillable = [
        'data_invio', 'contenuto', 'mittente', 'destinatario', 'alloggio'
    ];
}