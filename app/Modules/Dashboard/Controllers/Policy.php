<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Modules\Dashboard\Models\Policy_Model;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class Policy extends Controller{

    public function index(){
        $data = null;
        if (Cookie::get('search_privacy') == "") {
            // if cookie not existed
            $data = Policy_Model::orderBy('id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = Policy_Model::where("title", "like", '%' . Cookie::get('search_privacy') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('privacy');
        $row = json_decode(json_encode([
            "title" => "Policy - Danh sách",
        ]));

        return view("Dashboard::policy.index", compact("row", "data"));
    }

    public function postIndex(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_privacy", $request->search, 60);
            return redirect()->route("admin.policy")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function add() {
        if (!Gate::allows('add', explode("\\", get_class())[4])) {
            abort(403);
        }
        $settings = config('global.settings');
        $row = json_decode(json_encode([
            "title" => "Privacy - Thêm",
            "desc" => "Thêm mới",
        ]));
        return view("Dashboard::policy.add", compact("row", "settings"));
    }

    public function postAdd(Request $request){
        $this->validate($request, ["title" => "required", "content" => "required"], ["title.required" => "Vui lòng nhập tiêu đề", "content.required" => "Vui lòng nhập nội dung"]);
        $policy = new Policy_Model;
        $policy->title = $request->title;
        $policy->content = $request->content;
        $policy->status = $request->status;
        if ($policy->save()) {
            return back()->with(["type" => "success", "flash_message" => "Thêm thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function edit($id = 0) {
        if (!Gate::allows('edit', explode("\\", get_class())[4])) {
            abort(403);
        }
        $data = Policy_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Privacy - Cập nhật",
            "desc" => "Cập nhật",
        ]));
        return view("Dashboard::policy.edit", compact("row", "data"));
    }

    public function postEdit(Request $request, $id = 0) {
        $this->validate($request, ["title" => "required", "content" => "required"], ["title.required" => "Vui lòng nhập tiêu đề", "content.required" => "Vui lòng nhập nội dung"]);
        $policy = Policy_Model::find($id);
        $policy->title = $request->title;
        $policy->content = $request->content;
        $policy->status = $request->status;
        if ($policy->save()) {
            return back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function delete($id = "") {
        if (!Gate::allows('delete', explode("\\", get_class())[4])) {
            abort(403);
        }
        $list_id = json_decode($id);
        if (!isset($list_id[0]->id)) {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu để xóa."]);
        }
        if (count($list_id) == 1 && isset($list_id[0]->id)) {
            $policy = Policy_Model::find($list_id[0]->id);
            $policy->status = 2; //2 is trash
            if ($policy->save()) {
                return redirect()->route("admin.policy")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $policy = Policy_Model::find($value->id);
                $policy->status = 2; //2 is trash
                $policy->save();
            }
            return redirect()->route("admin.policy")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0) {
        $policy = Policy_Model::find($id);
        $policy->status = $status;
        if ($policy->save()) {
            return redirect()->route("admin.policy")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }

    public function trash() {
        if (!Gate::allows('delete', explode("\\", get_class())[4])) {
            abort(403);
        }
        $data = Policy_Model::where("status", 2)->orderBy('id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - Privacy",
        ]));
        return view("Dashboard::policy.trash", compact("row", "data"));
    }

    public function trashDelete($id = "") {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
            $data = Policy_Model::where("id", $list_id[0]->id)->first();
            $slide = Policy_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}