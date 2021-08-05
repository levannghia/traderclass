<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Modules\Dashboard\Models\Blog_Model;
use App\Modules\Dashboard\Models\BlogCategory_Model;
use App\Modules\Dashboard\Rules\Permission;
use Illuminate\Support\Facades\Auth;
//use App\Modules\Dashboard\Helpers\Helper;
use Illuminate\Support\Facades\Cookie;

class Blog extends Controller {

    public function __construct() {
        /*
        $this->middleware(function ($request, $next) {
            $permission = Permission::access(Auth::getUser()->id);
            foreach ($permission as $key => $value) {
                if ($value->class == "Blog" && $value->status == 0) {
                    return redirect("admin/403");
                }
            }
            return $next($request);
        });*/
    }

    public function index() {
        $data = null;
        if (Cookie::get('search_blog') == "") {
            // if cookie not existed
            $data = Blog_Model::orderBy('id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = Blog_Model::where("title", "like", '%' . Cookie::get('search_blog') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('blog');
        $row = json_decode(json_encode([
            "title" => "Blog - Bài viết",
        ]));
        return view("Dashboard::blog.index", compact("row", "data"));
    }

    public function postIndex(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_blog", $request->search, 60);
            return redirect()->route("admin.blog")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function add() {
        $settings = config('global.settings');
        //$list_category = BlogCategory_Model::whereIn("status", [0, 1])->orderBy('id', 'desc')->get();
        $row = json_decode(json_encode([
            "title" => "Blog - Bài viết",
            "desc" => "Thêm mới",
        ]));
        // return view("Dashboard::blog.add", compact("row", "list_category", "settings"));
        return view("Dashboard::blog.add", compact("row", "settings"));
    }

    public function postAdd(Request $request) {
        $settings = config('global.settings');
        $this->validate($request, ["title" => "required", "photo" => "required", "content" => "required"], ["title.required" => "Vui lòng nhập tiêu đề", "photo.required" => "Vui lòng chọn hình ảnh", "content.required" => "Vui lòng nhập nội dung"]);
        $blog = new Blog_Model;
        $blog->title = $request->title;
        if ($blog->alias == '') {
            $blog->alias = Str::slug($request->title);
        } else {
            $blog->alias = $request->alias;
        }
        $blog->excerpt = $request->excerpt;
        $blog->content = $request->content;
        $blog->status = $request->status;
        $blog->blog_category_id = $request->blog_category_id;

        $blog->meta_title = $request->meta_title;
        $blog->meta_keyword = $request->meta_keyword;
        $blog->meta_description = $request->meta_description;

        $blog->status = $request->status;
        if ($request->hasFile('photo')) {
            $file = $request->photo;
            $file_name = Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());
                $thumb_size = json_decode($settings["THUMB_SIZE_BLOG"]);
                $image_resize->fit($thumb_size->width, $thumb_size->height);
                $image_resize->save('public/upload/images/blog/thumb/' . $file_name);
            }
            // close upload image
            $file->move("public/upload/images/blog/large", $file_name);
            //save database
            $blog->photo = $file_name;
        }
        if ($blog->save()) {
            return back()->with(["type" => "success", "flash_message" => "Thêm thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function edit($id = 0) {
        $settings = config('global.settings');
        // $list_category = BlogCategory_Model::whereIn("status", [0, 1])->orderBy('id', 'desc')->get();
        $data = Blog_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Blog - Bài viết",
            "desc" => "Chỉnh sửa",
        ]));
        // return view("Dashboard::blog.edit", compact("row", "data", "list_category", "settings"));
        return view("Dashboard::blog.edit", compact("row", "data", "settings"));
    }

    public function postEdit(Request $request, $id = 0) {
        $settings = config('global.settings');
        $this->validate($request, ["title" => "required"], ["title.required" => "Vui lòng nhập tiêu đề", "alias.required" => "Vui lòng nhập link"]);

        $blog = Blog_Model::find($id);
        $blog->title = $request->title;
        if ($request->alias == "") {
            $blog->alias = Str::slug($request->title);
        } else {
            $blog->alias = $request->alias;
        }
        $blog->excerpt = $request->excerpt;
        $blog->content = $request->content;

        $blog->blog_category_id = $request->blog_category_id;

        $blog->meta_title = $request->meta_title;
        $blog->meta_keyword = $request->meta_keyword;
        $blog->meta_description = $request->meta_description;

        $blog->status = $request->status;
        if ($request->hasFile('photo')) {
            //delete if exist
            $image = str_replace("\\", "/", base_path()) . '/public/upload/images/blog/large/' . $blog->photo;
            if (file_exists($image)) {
                File::delete($image);
            }
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/blog/thumb/' . $blog->photo;
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }

            $file = $request->photo;
            $file_name = Str::slug(explode(".", $file->getClientOriginalName())[0], "-") . "-" . time() . "." . $file->getClientOriginalExtension();

            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());

                $thumb_size = json_decode($settings["THUMB_SIZE_BLOG"]);
                $image_resize->fit($thumb_size->width, $thumb_size->height);

                $image_resize->save('public/upload/images/blog/thumb/' . $file_name);
            }

            $file->move("public/upload/images/blog/large", $file_name);
            $blog->photo = $file_name;
        }
        if ($blog->save()) {
            return back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function delete($id = "") {
        $list_id = json_decode($id);
        if (!isset($list_id[0]->id)) {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu để xóa."]);
        }
        if (count($list_id) == 1 && isset($list_id[0]->id)) {
            $blog = Blog_Model::find($list_id[0]->id);
            $blog->status = 2; //2 is trash
            if ($blog->save()) {
                return redirect()->route("admin.blog")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $blog = Blog_Model::find($value->id);
                $blog->status = 2; //2 is trash
                $blog->save();
            }
            return redirect()->route("admin.blog")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0) {
        $blog = Blog_Model::find($id);
        $blog->status = $status;
        if ($blog->save()) {
            return redirect()->route("admin.blog")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }
    
    public function trash() {
        $data = Blog_Model::where("status", 2)->orderBy('id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - Blog",
        ]));
        return view("Dashboard::blog.trash", compact("row", "data"));
    }

    public function trashDelete($id = "") {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
            $data = Blog_Model::where("id", $list_id[0]->id)->first();
            $image_large = str_replace("\\", "/", base_path()) . '/public/upload/images/blog/large/' . $data->photo;
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/blog/thumb/' . $data->photo;
            if (file_exists($image_large)) {
                File::delete($image_large);
            }
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }
            $slide = Blog_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}
