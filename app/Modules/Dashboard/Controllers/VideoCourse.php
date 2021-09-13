<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Modules\Dashboard\Models\Course_Model;
use App\Modules\Dashboard\Models\VideoCourse_Model;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Gate;
use App\Modules\Dashboard\Rules\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class VideoCourse extends Controller{

    public function index(){
        $data = null;
        if (Cookie::get('search_vide0_course') == "") {
            // if cookie not existed
            $data = DB::table('course')->select('course.id','name','title','course.status','course.created_at','course.updated_at','teachers.fullname','course.photo')->join('course_category','course_category.id','=','course.course_category_id')->join('teachers','teachers.id','=','course.teacher_id')->orderBy('course.id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = DB::table('course')->select('course.id','name','title','course.status','course.created_at','course.updated_at','teachers.fullname','course.photo')->join('course_category','course_category.id','=','course.course_category_id')->join('teachers','teachers.id','=','course.teacher_id')->where("name", "like", '%' . Cookie::get('search_video_course') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('video-course');
        $row = json_decode(json_encode([
            "title" => "Video Course - Danh sách",
        ]));

        return view("Dashboard::video_course.index", compact("row", "data"));
    }

    public function postIndex(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_video_course", $request->search, 60);
            return redirect()->route("admin.videoCourse")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function add() {
        if (!Gate::allows('add', explode("\\", get_class())[4])) {
            abort(403);
        }
        $list_category = CourseCategory_Model::whereIn("status", [0, 1])->orderBy('id', 'desc')->get();
        $list_teacher = Teachers_Model::whereIn("status", [0, 1])->orderBy('id', 'desc')->get();
        $settings = config('global.settings');
        $row = json_decode(json_encode([
            "title" => "Course - Thêm",
            "desc" => "Thêm mới",
        ]));
        return view("Dashboard::course.add", compact("row", "settings",'list_category','list_teacher'));
    }

    public function postAdd(Request $request){
        $settings = config('global.settings');
        $this->validate($request, ["name" => "required", "photo" => "required", "video_id" => "required"], ["name.required" => "Vui lòng nhập tên khóa học", "photo.required" => "Vui lòng chọn hình ảnh", "video_id.required" => "Vui lòng nhập link video"]);
        $course = new Course_Model;
        $course->name = $request->name;
        $course->video_id = $request->video_id;
        $course->course_category_id = $request->course_category_id;
        $course->teacher_id = $request->teacher_id;
        $course->status = $request->status;
        if ($request->hasFile('photo')) {
            $file = $request->photo;
            $file_name = Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());
                $thumb_size = json_decode($settings["THUMB_SIZE_COURSE"]);
                $image_resize->fit($thumb_size->width, $thumb_size->height);
                $image_resize->save('public/upload/images/course/thumb/' . $file_name);
            }
            // close upload image
            $file->move("public/upload/images/course/large", $file_name);
            //save database
            $course->photo = $file_name;
        }
        if ($course->save()) {
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
        $list_category = CourseCategory_Model::whereIn("status", [0, 1])->orderBy('id', 'desc')->get();
        $list_teacher = Teachers_Model::whereIn("status", [0, 1])->orderBy('id', 'desc')->get();
        $data = Course_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Course - Cập nhật",
            "desc" => "Cập nhật",
        ]));
        return view("Dashboard::course.edit", compact("row", "data", "settings","list_category","list_teacher"));
    }

    public function postEdit(Request $request, $id = 0) {
        $settings = config('global.settings');
        $this->validate($request, ["name" => "required", "video_id" => "required"], ["name.required" => "Vui lòng nhập tên khóa học", "video_id.required" => "Vui lòng nhập link video"]);

        $course = Course_Model::find($id);
        $course->name = $request->name;
        $course->video_id = $request->video_id;
        $course->course_category_id = $request->course_category_id;
        $course->teacher_id = $request->teacher_id;
        $course->status = $request->status;
        if ($request->hasFile('photo')) {
            //delete if exist
            $image = str_replace("\\", "/", base_path()) . '/public/upload/images/course/large/' . $course->photo;
            if (file_exists($image)) {
                File::delete($image);
            }
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/course/thumb/' . $course->photo;
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }

            $file = $request->photo;
            $file_name = Str::slug(explode(".", $file->getClientOriginalName())[0], "-") . "-" . time() . "." . $file->getClientOriginalExtension();

            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());

                $thumb_size = json_decode($settings["THUMB_SIZE_COURSE"]);
                $image_resize->fit($thumb_size->width, $thumb_size->height);

                $image_resize->save('public/upload/images/course/thumb/' . $file_name);
            }

            $file->move("public/upload/images/course/large", $file_name);
            $course->photo = $file_name;
        }
        if ($course->save()) {
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
        //var_dump($list_id);
        //die();
        if (!isset($list_id[0]->id)) {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu để xóa."]);
        }
        if (count($list_id) == 1 && isset($list_id[0]->id)) {
            $course = Course_Model::find($list_id[0]->id);
            $course->status = 2; //2 is trash
            if ($course->save()) {
                return redirect()->route("admin.course")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $course = Course_Model::find($value->id);
                $course->status = 2; //2 is trash
                $course->save();
            }
            return redirect()->route("admin.course")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0) {
        $course = Course_Model::find($id);
        $course->status = $status;
        if ($course->save()) {
            return redirect()->route("admin.course")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }

    public function trash() {
        if (!Gate::allows('delete', explode("\\", get_class())[4])) {
            abort(403);
        }
        $data = DB::table('course')->select('course.id','name','title','course.status','course.created_at','course.updated_at','teachers.fullname','course.photo')->join('course_category','course_category.id','=','course.course_category_id')->join('teachers','teachers.id','=','course.teacher_id')->where('course.status',2)->orderBy('course.id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - Course",
        ]));
        return view("Dashboard::course.trash", compact("row", "data"));
    }

    public function trashDelete($id = "") {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
            $data = Course_Model::where("id", $list_id[0]->id)->first();
            $image_large = str_replace("\\", "/", base_path()) . '/public/upload/images/course/large/' . $data->photo;
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/course/thumb/' . $data->photo;
            if (file_exists($image_large)) {
                File::delete($image_large);
            }
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }
            $slide = Course_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}