<?php

namespace App\Models\Resources;

use \Illuminate\Database\Eloquent\Model;

class PostoLetto extends Model{
    protected $table = 'posto_letto';
    protected $primaryKey = 'id_posto_letto';
    public $timestamps = false;
}
