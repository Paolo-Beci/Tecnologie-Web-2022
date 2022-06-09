<?php

namespace App\Models\Resources;

use \Illuminate\Database\Eloquent\Model;

class Faq extends Model{
    protected $table = 'faq';
    protected $primaryKey = 'id_faq';
    public $timestamps = false;
    protected $guarded = ['id_faq'];

    protected $fillable = ['domanda', 'risposta', 'target'];
}

