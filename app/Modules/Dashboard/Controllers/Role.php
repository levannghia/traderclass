<?php

namespace App\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modules\Dashboard\Models\Role_Model;
use App\Modules\Dashboard\Models\RolePermission_Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class Role extends Controller
{
    public function __construct()
    {
        $className = explode("\\", get_class())[4];
        //echo $className;
    }
    
    public function index() {
        $data = null;
        
        if (Cookie::get('search_role') == "") {
            // if cookie not existed
            $data = Role_Model::orderBy('id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = Role_Model::where("name", "like", '%' . Cookie::get('search_role') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        // $list_permission = DB::table('role')
        // ->Join('role_permission', 'role.id', '=', 'role_permission.role_id')->where("role_id", )
        // ->get();
        $data->setPath('role');
        $row = json_decode(json_encode([
            "title" => "Vai trò",
        ]));
        return view("Dashboard::role.index", compact("row", "data"));
    }

    public function postIndex(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_role", $request->search, 60);
            return redirect()->route("admin.role")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function add() {
        if (!Gate::allows('add', explode("\\", get_class())[4])) {
            abort(403);
        }
        $settings = config('global.settings');
        $row = json_decode(json_encode([
            "title" => "Access Management - Thêm",
            "desc" => "Thêm mới",
        ]));
        return view("Dashboard::role.add", compact("row", "settings"));
    }

    public function postAdd(Request $request){
        $settings = config('global.settings');
        $this->validate($request, ["name" => "required", "note" => "required"], ["name.required" => "Vui lòng nhập tên vai trò", "note.required" => "Vui lòng nhập mô tả"]);
        $role = new Role_Model;
        $role->name = $request->name;
        $role->Note = $request->note;

        if ($role->save()) {
            return back()->with(["type" => "success", "flash_message" => "Thêm thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function edit($id = 0) {
        if (!Gate::allows('edit', explode("\\", get_class())[4])) {
            abort(403);
        }
        $settings = config('global.settings');
        // $list_category = BlogCategory_Model::whereIn("status", [0, 1])->orderBy('id', 'desc')->get();
        $data = Role_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Access Management - Cập nhật",
            "desc" => "Cập nhật",
        ]));
        return view("Dashboard::role.edit", compact("row", "data", "settings"));
    }

    public function postEdit(Request $request, $id = 0) {
        $settings = config('global.settings');
        $this->validate($request, ["name" => "required", "note" => "required"], ["name.required" => "Vui lòng nhập tên vai trò", "note.required" => "Vui lòng nhập mô tả"]);

        $role = Role_Model::find($id);
        $role->name = $request->name;
        $role->Note = $request->note;
        if ($role->save()) {
            return back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

}
