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

    public function index($id){
        $data = null;
        if (Cookie::get('search_video_course') == "") {
            // if cookie not existed
            $data = DB::table('video_course')->select('video_course.status','video_course.name', 'video_course.id', 'video_course.id_video','video_course.updated_at','video_course.created_at')->join('course', 'course.id','=','video_course.id_course')->where('video_course.id_course',$id)->orderBy('video_course.id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = DB::table('video_course')->select('video_course.status','video_course.name', 'video_course.id', 'video_course.id_video','video_course.updated_at','video_course.created_at')->join('course', 'course.id','=','video_course.id_course')->where("video_course.name", "like", '%' . Cookie::get('search_video_course') . '%')->where('video_course.id_course',$id)->orderBy('video_course.id', 'desc')->paginate(15);
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
            return redirect()->back()->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function add() {
        // if (!Gate::allows('add', explode("\\", get_class())[4])) {
        //     abort(403);
        // }
        $list_course = Course_Model::whereIn("status", [0, 1])->orderBy('id', 'desc')->get();
        $settings = config('global.settings');
        $row = json_decode(json_encode([
            "title" => "Video course - Thêm",
            "desc" => "Thêm mới",
        ]));
        return view("Dashboard::video_course.add", compact("row", "settings",'list_course'));
    }

    public function postAdd(Request $request){
        $settings = config('global.settings');
        $this->validate($request, ["name" => "required", "id_video" => "required"], ["name.required" => "Vui lòng nhập tên video", "id_video.required" => "Vui lòng nhập link video"]);
        $video_course = new VideoCourse_Model;
        $video_course->name = $request->name;
        $video_course->id_video = $request->id_video;
        $video_course->id_course = $request->id_course;
        $video_course->status = $request->status;
        
        if ($video_course->save()) {
            return back()->with(["type" => "success", "flash_message" => "Thêm thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function edit($id = 0) {
        // if (!Gate::allows('edit', explode("\\", get_class())[4])) {
        //     abort(403);
        // }
        $settings = config('global.settings');
        $list_course = Course_Model::whereIn("status", [0, 1])->orderBy('id', 'desc')->get();
        $data = VideoCourse_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Video course - Cập nhật",
            "desc" => "Cập nhật",
        ]));
        return view("Dashboard::video_course.edit", compact("row", "data", "settings","list_course"));
    }

    public function postEdit(Request $request, $id = 0) {
        $settings = config('global.settings');
        $this->validate($request, ["name" => "required", "id_video" => "required"], ["name.required" => "Vui lòng nhập tên video", "id_video.required" => "Vui lòng nhập link video"]);

        $video_course = VideoCourse_Model::find($id);
        $video_course->name = $request->name;
        $video_course->id_video = $request->id_video;
        $video_course->id_course = $request->id_course;
        $video_course->status = $request->status;
        // if ($request->hasFile('photo')) {
        //     //delete if exist
        //     $image = str_replace("\\", "/", base_path()) . '/public/upload/images/course/large/' . $course->photo;
        //     if (file_exists($image)) {
        //         File::delete($image);
        //     }
        //     $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/course/thumb/' . $course->photo;
        //     if (file_exists($image_thumb)) {
        //         File::delete($image_thumb);
        //     }

        //     $file = $request->photo;
        //     $file_name = Str::slug(explode(".", $file->getClientOriginalName())[0], "-") . "-" . time() . "." . $file->getClientOriginalExtension();

        //     //resize file befor to upload large
        //     if ($file->getClientOriginalExtension() != "svg") {
        //         $image_resize = Image::make($file->getRealPath());

        //         $thumb_size = json_decode($settings["THUMB_SIZE_COURSE"]);
        //         $image_resize->fit($thumb_size->width, $thumb_size->height);

        //         $image_resize->save('public/upload/images/course/thumb/' . $file_name);
        //     }

        //     $file->move("public/upload/images/course/large", $file_name);
        //     $course->photo = $file_name;
        // }
        if ($video_course->save()) {
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
        //var_dump($list_id);
        //die();
        if (!isset($list_id[0]->id)) {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu để xóa."]);
        }
        if (count($list_id) == 1 && isset($list_id[0]->id)) {
            $course = VideoCourse_Model::find($list_id[0]->id);
            $course->status = 2; //2 is trash
            if ($course->save()) {
                return redirect()->back()->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $course = VideoCourse_Model::find($value->id);
                $course->status = 2; //2 is trash
                $course->save();
            }
            return redirect()->back()->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0) {
        $course = VideoCourse_Model::find($id);
        $course->status = $status;
        if ($course->save()) {
            return redirect()->back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }

    public function trash() {
        // if (!Gate::allows('delete', explode("\\", get_class())[4])) {
        //     abort(403);
        // }
        $data = DB::table('video_course')->select('video_course.id_video','video_course.id','video_course.name','course.name AS course_name','video_course.status','video_course.created_at','video_course.updated_at')->join('course','course.id','=','video_course.id_course')->where('video_course.status',2)->orderBy('video_course.id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - Video course",
        ]));
        return view("Dashboard::video_course.trash", compact("row", "data"));
    }

    public function trashDelete($id = "") {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
            //$data = VideoCourse_Model::where("id", $list_id[0]->id)->first();
            // $image_large = str_replace("\\", "/", base_path()) . '/public/upload/images/course/large/' . $data->photo;
            // $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/course/thumb/' . $data->photo;
            // if (file_exists($image_large)) {
            //     File::delete($image_large);
            // }
            // if (file_exists($image_thumb)) {
            //     File::delete($image_thumb);
            // }
            $slide = VideoCourse_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}