<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Modules\Dashboard\Models\Subcribe_Model;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Modules\Dashboard\Rules\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class Subcribe extends Controller{

    public function index(){
        $data = null;
        if (Cookie::get('search_subcribe') == "") {
            // if cookie not existed
            $data = DB::table('subcribe')->orderBy('id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data =DB::table('subcribe')->where("email", "like", '%' . Cookie::get('search_subcribe') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('Subcribe');
        $row = json_decode(json_encode([
            "title" => "Subcribe - Danh sách",
        ]));

        return view("Dashboard::subcribe.index", compact("row", "data"));
    }

    public function postIndex(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_subcribe", $request->search, 60);
            return redirect()->route("admin.subcribe")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }
}