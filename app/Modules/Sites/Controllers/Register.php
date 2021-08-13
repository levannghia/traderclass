<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Modules\Sites\Models\Course_Model;

class Register extends Controller
{
    public function index()
    {
        $row = json_decode(json_encode([
            "title" => "Register",
        ]));
        return view('Sites::register.index',compact('row'));
    }
}