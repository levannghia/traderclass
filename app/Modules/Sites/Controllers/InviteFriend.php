<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Modules\Sites\Models\Users_Model;

class InviteFriend extends Controller
{
    public function index()
    {
        $row = json_decode(json_encode([
            "title" => "Invite Friends",
        ]));
        return view('Sites::invite_friends.index',compact('row'));
    }
}