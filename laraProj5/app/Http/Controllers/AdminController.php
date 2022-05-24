<?php

namespace App\Http\Controllers;

use App\Models\Admin;

class AdminController extends Controller {

    protected $_adminModel;

    public function __construct() {
        $this->middleware('can:isAdmin');
        $this->_adminModel = new Admin();
    }

    public function index() {
        return view('layouts/content-home');
    }

    public function showFaq() {
        $faq = $this->_adminModel->getFaq();

        return view('gestione-faq')
            ->with('faq', $faq);
    }

    public function insertFaq() {
        return view('insert-faq');
    }

}
