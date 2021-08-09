<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Modules\Dashboard\Models\Teachers_Model;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\ImageManagerStatic as Image;
use App\Modules\Dashboard\Rules\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class Teachers extends Controller{

    public function __construct()
    {
        //$className = explode("\\", get_class())[4];
       
    }

    public function index(){
        $data = null;
        if (Cookie::get('search_teacher') == "") {
            // if cookie not existed
            $data = Teachers_Model::orderBy('id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = Teachers_Model::where("fullname", "like", '%' . Cookie::get('search_teacher') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('teachers');
        $row = json_decode(json_encode([
            "title" => "Teacher - Danh sách",
        ]));

        return view("Dashboard::teacher.index", compact("row", "data"));
    }

    public function postIndex(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_teacher", $request->search, 60);
            return redirect()->route("admin.teacher")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function add() {
        if (!Gate::allows('add', explode("\\", get_class())[4])) {
            abort(403);
        }
        $settings = config('global.settings');
        $row = json_decode(json_encode([
            "title" => "Teacher - Thêm",
            "desc" => "Thêm mới",
        ]));
        return view("Dashboard::teacher.add", compact("row", "settings"));
    }

    public function postAdd(Request $request){
        $settings = config('global.settings');
        $this->validate($request, ["fullname" => "required", "position" => "required", "photo" => "required"], ["fullname.required" => "Vui lòng nhập họ tên", "photo.required" => "Vui lòng chọn hình ảnh", "position.required" => "Vui lòng nhập chức vụ"]);
        $teacher = new Teachers_Model;
        $teacher->fullname = $request->fullname;
        $teacher->position = $request->position;
        $teacher->status = $request->status;
        $teacher->type = 1;
        if ($request->hasFile('photo')) {
            $file = $request->photo;
            $file_name = Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            $file_name_2 = "all_class".Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());
                $thumb_size = json_decode($settings["THUMB_SIZE_TEACHERS"]);
                $image_resize->fit($thumb_size->width, $thumb_size->height);
                $image_resize->save('public/upload/images/teachers/thumb/' . $file_name);

                $image_resize_2 = Image::make($file->getRealPath());
                //$thumb_size = json_decode($settings["THUMB_SIZE_TEACHERS"]);
                $image_resize_2->fit(350, 467);
                $image_resize_2->save('public/upload/images/teachers/thumb/' . $file_name_2);
            }
            // close upload image
            $file->move("public/upload/images/teachers/large", $file_name);
            //save database
            $teacher->photo = $file_name;
        }
        if ($teacher->save()) {
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
        $data = Teachers_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Teacher - Cập nhật",
            "desc" => "Cập nhật",
        ]));
        return view("Dashboard::teacher.edit", compact("row", "data", "settings"));
    }

    public function postEdit(Request $request, $id = 0) {
        $settings = config('global.settings');
        $this->validate($request, ["fullname" => "required", "position" => "required"], ["fullname.required" => "Vui lòng nhập họ tên"]);
        $teacher = Teachers_Model::find($id);
        $teacher->fullname = $request->fullname;
        $teacher->position = $request->position;
        $teacher->status = $request->status;
        $teacher->type = $request->type;
        if ($request->hasFile('photo')) {
            //delete if exist
            $image = str_replace("\\", "/", base_path()) . '/public/upload/images/teachers/large/' . $teacher->photo;
            if (file_exists($image)) {
                File::delete($image);
            }
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/teachers/thumb/' . $teacher->photo;
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }

            $image_thumb_2 = str_replace("\\", "/", base_path()) . '/public/upload/images/teachers/thumb/' .'all_class'. $teacher->photo;
            if (file_exists($image_thumb_2)) {
                File::delete($image_thumb_2);
            }

            $file = $request->photo;
            $file_name = Str::slug(explode(".", $file->getClientOriginalName())[0], "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            $file_name_2 = "all_class".Str::slug(explode(".",$file->getClientOriginalName())[0], "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());

                $thumb_size = json_decode($settings["THUMB_SIZE_TEACHERS"]);
                $image_resize->fit($thumb_size->width, $thumb_size->height);

                $image_resize->save('public/upload/images/teachers/thumb/' . $file_name);

                $image_resize_2 = Image::make($file->getRealPath());
                //$thumb_size = json_decode($settings["THUMB_SIZE_TEACHERS"]);
                $image_resize_2->fit(350, 467);
                $image_resize_2->save('public/upload/images/teachers/thumb/' . $file_name_2);
            }

            $file->move("public/upload/images/teachers/large", $file_name);
            $teacher->photo = $file_name;
        }
        if ($teacher->save()) {
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
            $teacher = Teachers_Model::find($list_id[0]->id);
            $teacher->status = 2; //2 is trash
            if ($teacher->save()) {
                return redirect()->route("admin.teacher")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $teacher = Teachers_Model::find($value->id);
                $teacher->status = 2; //2 is trash
                $teacher->save();
            }
            return redirect()->route("admin.teacher")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0) {
        $teacher = Teachers_Model::find($id);
        $teacher->status = $status;
        if ($teacher->save()) {
            return redirect()->route("admin.teacher")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }

    public function trash() {
        if (!Gate::allows('delete', explode("\\", get_class())[4])) {
            abort(403);
        }
        $data = Teachers_Model::where("status", 2)->orderBy('id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - Teacher",
        ]));
        return view("Dashboard::teacher.trash", compact("row", "data"));
    }

    public function trashDelete($id = "") {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
            $data = Teachers_Model::where("id", $list_id[0]->id)->first();
            $image_large = str_replace("\\", "/", base_path()) . '/public/upload/images/teachers/large/' . $data->photo;
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/teachers/thumb/' . $data->photo;
            if (file_exists($image_large)) {
                File::delete($image_large);
            }
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }
            $slide = Teachers_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}