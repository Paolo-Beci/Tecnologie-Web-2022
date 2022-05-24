<?php

namespace App\Http\Controllers;

use App\Models\Resources\Product;
use App\Http\Requests\NewProductRequest;

class LocatarioController extends Controller {

    public function __construct() {
        $this->middleware('can:isLocatario');
    }

    public function index() {
        return view('layouts/content-home');
    }

}
