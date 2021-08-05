<?php

namespace App\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;

class Errorcode extends Controller {
    public function index(){
        return view('Dashboard::403.index');
    }
}