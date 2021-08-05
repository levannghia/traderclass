<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Modules\Dashboard\Models\Users_Model;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\ImageManagerStatic as Image;
use App\Modules\Dashboard\Rules\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class Users extends Controller{

    public function index(){
        $data = null;
        if (Cookie::get('search_user') == "") {
            // if cookie not existed
            $data = Users_Model::orderBy('id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = Users_Model::where("fullname", "like", '%' . Cookie::get('search_user') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('user');
        $row = json_decode(json_encode([
            "title" => "User - Danh sách",
        ]));

        return view("Dashboard::user.index", compact("row", "data"));
    }

    public function postIndex(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_user", $request->search, 60);
            return redirect()->route("admin.users")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function status($id = 0, $status = 0) {
        $admin = Users_Model::find($id);
        $admin->status = $status;
        if ($admin->save()) {
            return redirect()->route("admin.users")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }

}