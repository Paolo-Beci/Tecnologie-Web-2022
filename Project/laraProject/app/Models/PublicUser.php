<?php

use App\Models\Resources\Faq;

class PublicUser
{
    //metodo per tornare una faq in base ad un target dato
    public function getFaqByTarget($target){
        return Faq::where('target', $target)->get();
    }
}
