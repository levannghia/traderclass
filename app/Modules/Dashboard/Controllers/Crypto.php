<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Modules\Dashboard\Models\Crypto_Model;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class Crypto extends Controller{

    public function __construct()
    {
        //$className = explode("\\", get_class())[4];
       
    }

    public function index(){
        $data = null;
        if (Cookie::get('search_crypto') == "") {
            // if cookie not existed
            $data = Crypto_Model::orderBy('id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = Crypto_Model::where("name", "like", '%' . Cookie::get('search_crypto') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('cryptocurrency-wallet');
        $row = json_decode(json_encode([
            "title" => "Cryptocurrency wallet - Danh sách",
        ]));

        return view("Dashboard::crypto.index", compact("row", "data"));
    }

    public function postIndex(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_crypto", $request->search, 60);
            return redirect()->route("admin.wallet")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function add() {
        if (!Gate::allows('add', explode("\\", get_class())[4])) {
            abort(403);
        }
        $settings = config('global.settings');
        $row = json_decode(json_encode([
            "title" => "Cryptocurrency wallet - Thêm",
            "desc" => "Thêm mới",
        ]));
        return view("Dashboard::crypto.add", compact("row", "settings"));
    }

    public function postAdd(Request $request){
        $this->validate($request, ["name" => "required","address" => "required"], ["name.required" => "Vui lòng nhập tiêu đề","address.required" => "Vui lòng nhập địa chỉ ví"]);
        $cryptocurrency_wallet = new Crypto_Model;
        $cryptocurrency_wallet->name = $request->name;
        $cryptocurrency_wallet->address = $request->address;
        $cryptocurrency_wallet->status = $request->status;
        if ($cryptocurrency_wallet->save()) {
            return back()->with(["type" => "success", "flash_message" => "Thêm thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function edit($id = 0) {
        if (!Gate::allows('edit', explode("\\", get_class())[4])) {
            abort(403);
        }
        $data = Crypto_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Course Categories - Cập nhật",
            "desc" => "Cập nhật",
        ]));
        return view("Dashboard::crypto.edit", compact("row", "data"));
    }

    public function postEdit(Request $request, $id = 0) {
        $this->validate($request, ["name" => "required","address" => "required"], ["name.required" => "Vui lòng nhập tiêu đề","address.required" => "Vui lòng nhập địa chỉ ví"]);
        $cryptocurrency_wallet = Crypto_Model::find($id);
        $cryptocurrency_wallet->name = $request->name;
        $cryptocurrency_wallet->address = $request->address;
        $cryptocurrency_wallet->status = $request->status;
        if ($cryptocurrency_wallet->save()) {
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
            $cryptocurrency_wallet = Crypto_Model::find($list_id[0]->id);
            $cryptocurrency_wallet->status = 2; //2 is trash
            if ($cryptocurrency_wallet->save()) {
                return redirect()->route("admin.wallet")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $cryptocurrency_wallet = Crypto_Model::find($value->id);
                $cryptocurrency_wallet->status = 2; //2 is trash
                $cryptocurrency_wallet->save();
            }
            return redirect()->route("admin.wallet")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0) {
        $cryptocurrency_wallet = Crypto_Model::find($id);
        $cryptocurrency_wallet -> status = $status;
        if ($cryptocurrency_wallet->save()) {
            return redirect()->route("admin.wallet")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }

    public function trash() {
        if (!Gate::allows('delete', explode("\\", get_class())[4])) {
            abort(403);
        }
        $data = Crypto_Model::where("status", 2)->orderBy('id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - Cryptocurrency Wallet",
        ]));
        return view("Dashboard::crypto.trash", compact("row", "data"));
    }

    public function trashDelete($id = "") {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
            $data = Crypto_Model::where("id", $list_id[0]->id)->first();
            $slide = Crypto_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}