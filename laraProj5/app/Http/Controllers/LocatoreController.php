<?php

namespace App\Http\Controllers;
use App\Models\Resources\Product;
use App\Http\Requests\NewProductRequest;

class LocatoreController extends Controller {

    public function __construct() {
        $this->middleware('can:isLocatore');
    }

    public function index() {
        return view('layouts/content-home');
    }

}
