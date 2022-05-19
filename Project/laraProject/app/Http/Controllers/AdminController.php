<?php

namespace App\Http\Controllers;

use App\Models\Admin;

class AdminController
{
    protected $_controllerModel;

    public function __construct()
    {
        $this->_controllerModel = new Admin();
    }

    public function showAdminHome() {
        return view('layouts/content-home-admin')
            ->with('user', 'admin');
    }

    public function showFaq() {
        $faq = $this->_controllerModel->getFaq();

        return view('gestione-faq')
            ->with('faq', $faq);
    }
}
