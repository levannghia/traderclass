<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Modules\Sites\Models\Users_Model;

class Account extends Controller
{
    public function index()
    {

        $row = json_decode(json_encode([
            "title" => "Account information",
        ]));
        return view('Sites::account.index',compact('row'));
    }

    public function logout()
    {
        Auth::guard("web")->logout();
        if (!Auth::guard("web")->check()) {
            return redirect()->route("sites.home.index");
        }
    }
}