<?php

namespace App\Models;
use App\Models\Resources\Faq;

class Admin
{
    public function getFaq(){
        return Faq::all();
    }
}
