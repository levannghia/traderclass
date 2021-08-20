<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Modules\Sites\Models\Users_Model;

class MasterClass extends Controller
{
    public function index()
    {
        $row = json_decode(json_encode([
            "title" => "MasterClass",
        ]));
        return view('Sites::master_class.index',compact('row'));
    }
}