<?php

namespace App\Models\Resources;

use \Illuminate\Database\Eloquent\Model;

class Appartamento extends Model{
    protected $table = 'appartamento';
    protected $primaryKey = 'id_appartamento';
    public $timestamps = false;
    protected $guarded = ['id_appartamento'];
    protected $fillable = ['num_camere', 'alloggio'];
}
