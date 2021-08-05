<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Modules\Dashboard\Models\Admins_Model;
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

class Admins extends Controller{

    public function __construct()
    {
        //$className = explode("\\", get_class())[4];
       
    }

    public function index(){
        $data = null;
        if (Cookie::get('search_admin') == "") {
            // if cookie not existed
            $data = DB::table('admins')->select('admins.id','name','email','fullname','photo','gender','phone','address','status')->join('admins_role', 'admins.id', '=', 'admins_role.admins_id')->join('role', 'admins_role.role_id', '=', 'role.id')->orderBy('admins.id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = DB::table('admins')->select('admins.id','name','email','fullname','photo','gender','phone','address','status')->join('admins_role', 'admins.id', '=', 'admins_role.admins_id')->join('role', 'admins_role.role_id', '=', 'role.id')->where("fullname", "like", '%' . Cookie::get('search_admin') . '%')->orderBy('admins.id', 'desc')->paginate(15);
        }
        $data->setPath('admins');
        $row = json_decode(json_encode([
            "title" => "Admin - Danh sách",
        ]));

        return view("Dashboard::admin.index", compact("row", "data"));
    }

    public function postIndex(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_admin", $request->search, 60);
            return redirect()->route("admin.admins")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function add() {
        if (!Gate::allows('add', explode("\\", get_class())[4])) {
            abort(403);
        }
        $settings = config('global.settings');
        $row = json_decode(json_encode([
            "title" => "Admin - Thêm",
            "desc" => "Thêm mới",
        ]));
        return view("Dashboard::admin.add", compact("row", "settings"));
    }

    public function postAdd(Request $request){
        $settings = config('global.settings');
        $this->validate($request, ["email" => "required|unique:admins,email", "fullname" => "required", "address" => "required", "photo" => "required", "phone" => "required"], ["email.unique"=>"Email đã có người sử dụng", "fullname.required" => "Vui lòng nhập họ tên", "photo.required" => "Vui lòng chọn hình ảnh", "email.required" => "Vui lòng nhập email", "phone.required" => "Vui lòng nhập số điện thoại", "address.required" => "Vui lòng nhập số địa chỉ"]);
        $admin = new Admins_Model;
        $admin->fullname = $request->fullname;
        $admin->email = $request->email;
        $admin->gender = $request->gender;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->password = Hash::make($request->password);
        $admin->status = $request->status;
        $admin->type = 0;
        $admin->remember_token = "";
        if ($request->hasFile('photo')) {
            $file = $request->photo;
            $file_name = Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());
                $thumb_size = json_decode($settings["THUMB_SIZE_ADMIN"]);
                $image_resize->fit($thumb_size->width, $thumb_size->height);
                $image_resize->save('public/upload/images/admins/thumb/' . $file_name);
            }
            // close upload image
            $file->move("public/upload/images/admins/large", $file_name);
            //save database
            $admin->photo = $file_name;
        }
        if ($admin->save()) {
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
        $data = Admins_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Admin - Cập nhật",
            "desc" => "Cập nhật",
        ]));
        // return view("Dashboard::blog.edit", compact("row", "data", "list_category", "settings"));
        return view("Dashboard::admin.edit", compact("row", "data", "settings"));
    }

    public function postEdit(Request $request, $id = 0) {
        $settings = config('global.settings');
        $this->validate($request, ["fullname" => "required", "address" => "required", "password"=>"required", "email" => "required", "phone" => "required"], ["fullname.required" => "Vui lòng nhập họ tên", "password.required" => "Vui lòng nhập mật khẩu", "email.required" => "Vui lòng nhập email", "phone.required" => "Vui lòng nhập số điện thoại", "address.required" => "Vui lòng nhập số địa chỉ"]);

        $admin = Admins_Model::find($id);
        $admin->fullname = $request->fullname;
        $admin->email = $request->email;
        $admin->gender = $request->gender;

        $admin->phone = $request->phone;
        $admin->address = $request->address;

        $admin->status = $request->status;
        $admin->password = Hash::make($request->password);
        if ($request->hasFile('photo')) {
            //delete if exist
            $image = str_replace("\\", "/", base_path()) . '/public/upload/images/admins/large/' . $admin->photo;
            if (file_exists($image)) {
                File::delete($image);
            }
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/admins/thumb/' . $admin->photo;
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }

            $file = $request->photo;
            $file_name = Str::slug(explode(".", $file->getClientOriginalName())[0], "-") . "-" . time() . "." . $file->getClientOriginalExtension();

            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());

                $thumb_size = json_decode($settings["THUMB_SIZE_ADMIN"]);
                $image_resize->fit($thumb_size->width, $thumb_size->height);

                $image_resize->save('public/upload/images/admins/thumb/' . $file_name);
            }

            $file->move("public/upload/images/admins/large", $file_name);
            $admin->photo = $file_name;
        }
        if ($admin->save()) {
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
            $admin = Admins_Model::find($list_id[0]->id);
            $admin->status = 2; //2 is trash
            if ($admin->save()) {
                return redirect()->route("admin.admins")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $admin = Admins_Model::find($value->id);
                $admin->status = 2; //2 is trash
                $admin->save();
            }
            return redirect()->route("admin.admins")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0) {
        $admin = Admins_Model::find($id);
        $admin->status = $status;
        if ($admin->save()) {
            return redirect()->route("admin.admins")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }

    public function trash() {
        if (!Gate::allows('delete', explode("\\", get_class())[4])) {
            abort(403);
        }
        $data = Admins_Model::where("status", 2)->orderBy('id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - Admin",
        ]));
        return view("Dashboard::admin.trash", compact("row", "data"));
    }

    public function trashDelete($id = "") {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
            $data = Admins_Model::where("id", $list_id[0]->id)->first();
            $image_large = str_replace("\\", "/", base_path()) . '/public/upload/images/admins/large/' . $data->photo;
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/admins/thumb/' . $data->photo;
            if (file_exists($image_large)) {
                File::delete($image_large);
            }
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }
            $slide = Admins_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}