<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Dashboard\Controllers\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Modules\Sites\Models\Config_Model;
use Validator;
use Carbon\Carbon;

class Terms extends Controller
{
    public function index()
    {
        $config_link_youtube = Config_Model::find(6);
        $config_link_facebook = Config_Model::find(7);
        $config_link_instagram = Config_Model::find(8);
        $config_chplay_link = Config_Model::find(37);
        $config_apple_store_link = Config_Model::find(38);

        $row = json_decode(json_encode([
            "title" => "Terms",
        ]));

        return view('Sites::terms.index', compact('row','config_link_youtube','config_link_facebook','config_link_instagram','config_chplay_link','config_apple_store_link'));
    }
}