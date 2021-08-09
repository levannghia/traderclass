<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Modules\Sites\Models\Config_Model;
use App\Modules\Sites\Models\Policy_Model;

class Policy extends Controller
{
    public function privacy()
    {
        $privacy = Policy_Model::where('title','Privacy Policy')->first();
        $row = json_decode(json_encode([
            "title" => "Privacy Policy",
        ]));

        return view('Sites::privacy.index', compact('privacy','row'));
    }

    public function terms()
    {
        $terms = Policy_Model::where('title','Term Of Service')->first();
        $row = json_decode(json_encode([
            "title" => "Terms Of Service",
        ]));

        return view('Sites::terms.index', compact('terms','row'));
    }

    public function refundPolicy()
    {
        $refund_policy = Policy_Model::where('title','Return & Refund Policy')->first();
        $row = json_decode(json_encode([
            "title" => "Return & Refund Policy",
        ]));

        return view('Sites::refund_policy.index', compact('refund_policy','row'));
    }
}