<?php

namespace App\Models\Resources;

use \Illuminate\Database\Eloquent\Model;

class Alloggio extends Model{
    protected $table = 'alloggio';
    protected $primaryKey = 'id_alloggio';
    public $timestamps = false;
}
