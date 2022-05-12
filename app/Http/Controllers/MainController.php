<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller {
    public function inicio() {
        return view('main-page');
    }
}
