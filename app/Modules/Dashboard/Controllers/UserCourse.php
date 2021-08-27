<?php

namespace App\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modules\Dashboard\Models\Admins_Model;
use App\Modules\Dashboard\Models\Users_Model;
use App\Modules\Dashboard\Models\Course_Model;
use App\Modules\Dashboard\Models\UserCourse_Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class UserCourse extends Controller
{

    public function index($id = 0) {
        $settings = config('global.settings');
        $data = null;
        if (Cookie::get('search_user_course') == "") {
            // if cookie not existed
            $data = DB::table('user_course')->select('course.name','user_course.id','users.fullname','email','gender','users.photo','users.phone','users.address','users.status')->join('course','course.id','=','user_course.course_id')->join('users','users.id','=','user_course.user_id')->where('course.id',$id)->where('user_course.status',1)->orderBy('users.id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = DB::table('user_course')->select('course.name','user_course.id','users.fullname','email','gender','users.photo','users.phone','users.address','users.status')->join('course','course.id','=','user_course.course_id')->join('users','users.id','=','user_course.user_id')->where("fullname", "like", '%' . Cookie::get('search_user_course') . '%')->where('course.id',$id)->where('user_course.status',1)->orderBy('users.id', 'desc')->paginate(15);
        }
        $course = Course_Model::find($id);
        $data->setPath('user_course');
        $row = json_decode(json_encode([
            "title" => "Danh sách lớp " . $course->name,
        ]));
        return view("Dashboard::user_course.index", compact("row", "settings", "data"));
    }

    public function postIndex($id = 0, Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_user_course", $request->search, 60);
            return redirect()->route("admin.class")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
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
            $class = UserCourse_Model::find($list_id[0]->id);
            $class->status = 2; //2 is trash
            if ($class->save()) {
                return redirect()->back()->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $class = UserCourse_Model::find($value->id);
                $class->status = 2; //2 is trash
                $class->save();
            }
            return redirect()->back()->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0) {
        $class = UserCourse_Model::find($id);
        $class->status = $status;
        if ($class->save()) {
            return redirect()->back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }

    public function trash() {
        // if (!Gate::allows('delete', explode("\\", get_class())[4])) {
        //     abort(403);
        // }
        $data = DB::table('user_course')->select('course.name','user_course.id','users.fullname','email','gender','users.photo','users.phone','users.address','users.status')->join('course','course.id','=','user_course.course_id')->join('users','users.id','=','user_course.user_id')->where('user_course.status',2)->orderBy('users.id', 'desc')->paginate(15);
        //$data = UserCourse_Model::where("status", 2)->orderBy('id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - Class",
        ]));
        return view("Dashboard::user_course.trash", compact("row", "data"));
    }

    public function trashDelete($id = "") {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
           
            $slide = Admins_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}
