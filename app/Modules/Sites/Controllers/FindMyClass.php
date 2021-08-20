<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Modules\Sites\Models\Users_Model;

class FindMyClass extends Controller
{
    public function index()
    {
        $row = json_decode(json_encode([
            "title" => "Find my classes",
        ]));
        return view('Sites::find_my_class.index',compact('row'));
    }
}