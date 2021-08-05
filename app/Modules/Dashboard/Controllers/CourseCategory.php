<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Modules\Dashboard\Models\CourseCategory_Model;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use App\Modules\Dashboard\Rules\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class CourseCategory extends Controller{

    public function __construct()
    {
        //$className = explode("\\", get_class())[4];
       
    }

    public function index(){
        $data = null;
        if (Cookie::get('search_course_category') == "") {
            // if cookie not existed
            $data = CourseCategory_Model::orderBy('id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = CourseCategory_Model::where("title", "like", '%' . Cookie::get('search_course_category') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('course_category');
        $row = json_decode(json_encode([
            "title" => "Course Categories - Danh sách",
        ]));

        return view("Dashboard::course_category.index", compact("row", "data"));
    }

    public function postIndex(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_course_category", $request->search, 60);
            return redirect()->route("admin.course_category")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function add() {
        // if (!Gate::allows('add', explode("\\", get_class())[4])) {
        //     abort(403);
        // }
        $settings = config('global.settings');
        $row = json_decode(json_encode([
            "title" => "Course Categories - Thêm",
            "desc" => "Thêm mới",
        ]));
        return view("Dashboard::course_category.add", compact("row", "settings"));
    }

    public function postAdd(Request $request){
        $this->validate($request, ["title" => "required"], ["title.required" => "Vui lòng nhập tiêu đề"]);
        $course_category = new CourseCategory_Model;
        $course_category->title = $request->title;
        $course_category->status = $request->status;
        if ($course_category->save()) {
            return back()->with(["type" => "success", "flash_message" => "Thêm thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function edit($id = 0) {
        // if (!Gate::allows('edit', explode("\\", get_class())[4])) {
        //     abort(403);
        // }
        $data = CourseCategory_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Course Categories - Cập nhật",
            "desc" => "Cập nhật",
        ]));
        return view("Dashboard::course_category.edit", compact("row", "data"));
    }

    public function postEdit(Request $request, $id = 0) {
        $this->validate($request, ["title" => "required"], ["title.required" => "Vui lòng nhập tiêu đề"]);
        $course_category = CourseCategory_Model::find($id);
        $course_category->title = $request->title;
        $course_category->status = $request->status;
        if ($course_category->save()) {
            return back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function delete($id = "") {
        // if (!Gate::allows('delete', explode("\\", get_class())[4])) {
        //     abort(403);
        // }
        $list_id = json_decode($id);
        if (!isset($list_id[0]->id)) {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu để xóa."]);
        }
        if (count($list_id) == 1 && isset($list_id[0]->id)) {
            $course_category = CourseCategory_Model::find($list_id[0]->id);
            $course_category->status = 2; //2 is trash
            if ($course_category->save()) {
                return redirect()->route("admin.course_category")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $course_category = CourseCategory_Model::find($value->id);
                $course_category->status = 2; //2 is trash
                $course_category->save();
            }
            return redirect()->route("admin.course_category")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0) {
        $faq = CourseCategory_Model::find($id);
        $faq->status = $status;
        if ($faq->save()) {
            return redirect()->route("admin.course_category")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }

    public function trash() {
        // if (!Gate::allows('delete', explode("\\", get_class())[4])) {
        //     abort(403);
        // }
        $data = CourseCategory_Model::where("status", 2)->orderBy('id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - Course Categories",
        ]));
        return view("Dashboard::faq.trash", compact("row", "data"));
    }

    public function trashDelete($id = "") {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
            $data = CourseCategory_Model::where("id", $list_id[0]->id)->first();
            $slide = CourseCategory_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}