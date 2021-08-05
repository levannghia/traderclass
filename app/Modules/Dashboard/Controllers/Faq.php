<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Modules\Dashboard\Models\Faq_Model;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use App\Modules\Dashboard\Rules\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class Faq extends Controller{

    public function __construct()
    {
        //$className = explode("\\", get_class())[4];
       
    }

    public function index(){
        $data = null;
        if (Cookie::get('search_faq') == "") {
            // if cookie not existed
            $data = Faq_Model::orderBy('id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = Faq_Model::where("title", "like", '%' . Cookie::get('search_faq') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('faq');
        $row = json_decode(json_encode([
            "title" => "FAQ - Danh sách",
        ]));

        return view("Dashboard::faq.index", compact("row", "data"));
    }

    public function postIndex(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_faq", $request->search, 60);
            return redirect()->route("admin.faq")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function add() {
        if (!Gate::allows('add', explode("\\", get_class())[4])) {
            abort(403);
        }
        $settings = config('global.settings');
        $row = json_decode(json_encode([
            "title" => "FAQ - Thêm",
            "desc" => "Thêm mới",
        ]));
        return view("Dashboard::faq.add", compact("row", "settings"));
    }

    public function postAdd(Request $request){
        $this->validate($request, ["title" => "required", "content" => "required"], ["title.required" => "Vui lòng nhập tiêu đề", "content.required" => "Vui lòng nhập nội dung"]);
        $faq = new Faq_Model;
        $faq->title = $request->title;
        $faq->content = $request->content;
        $faq->type = $request->type;
        $faq->status = $request->status;
        if ($faq->save()) {
            return back()->with(["type" => "success", "flash_message" => "Thêm thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function edit($id = 0) {
        if (!Gate::allows('edit', explode("\\", get_class())[4])) {
            abort(403);
        }
        $data = Faq_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "FAQ - Cập nhật",
            "desc" => "Cập nhật",
        ]));
        return view("Dashboard::faq.edit", compact("row", "data"));
    }

    public function postEdit(Request $request, $id = 0) {
        $this->validate($request, ["title" => "required", "content" => "required"], ["title.required" => "Vui lòng nhập tiêu đề", "content.required" => "Vui lòng nhập nội dung"]);
        $faq = Faq_Model::find($id);
        $faq->title = $request->title;
        $faq->content = $request->content;
        $faq->type = $request->type;
        $faq->status = $request->status;
        if ($faq->save()) {
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
            $faq = Faq_Model::find($list_id[0]->id);
            $faq->status = 2; //2 is trash
            if ($faq->save()) {
                return redirect()->route("admin.faq")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $faq = Faq_Model::find($value->id);
                $faq->status = 2; //2 is trash
                $faq->save();
            }
            return redirect()->route("admin.faq")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0) {
        $faq = Faq_Model::find($id);
        $faq->status = $status;
        if ($faq->save()) {
            return redirect()->route("admin.faq")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }

    public function trash() {
        if (!Gate::allows('delete', explode("\\", get_class())[4])) {
            abort(403);
        }
        $data = Faq_Model::where("status", 2)->orderBy('id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - FAQ",
        ]));
        return view("Dashboard::faq.trash", compact("row", "data"));
    }

    public function trashDelete($id = "") {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
            $data = Faq_Model::where("id", $list_id[0]->id)->first();
            $slide = Faq_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}