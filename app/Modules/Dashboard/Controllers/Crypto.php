<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Modules\Dashboard\Models\Crypto_Model;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class Crypto extends Controller{

    public function __construct()
    {
        //$className = explode("\\", get_class())[4];
       
    }

    public function priceAPI(Request $request){
        $url = 'https://api.binance.com/api/v3/ticker/price?symbol=' . $request->id_symbol;
        $api =  file_get_contents($url);
        $price = json_decode($api, true);
        return response()->json($price, 200);
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
        $data->setPath('crypto');
        $row = json_decode(json_encode([
            "title" => "Crypto - Danh sách",
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
        $client = new CoinGeckoClient();
        $name = $client->coins()->getMarkets('usd');
    
        // $url_crypto_name = 'https://api.coincap.io/v2/assets';
        // $api_crypto_name =  file_get_contents($url_crypto_name);
        // $name = json_decode($api_crypto_name, true);

        $url = 'https://api.binance.com/api/v3/ticker/price';
        $api =  file_get_contents($url);
        $symbol = json_decode($api, true);
        $settings = config('global.settings');
        $row = json_decode(json_encode([
            "title" => "Crypto - Thêm",
            "desc" => "Thêm mới",
        ]));
        return view("Dashboard::crypto.add", compact("row", "settings","symbol","name"));
    }

    public function postAdd(Request $request){
        $settings = config('global.settings');
        $this->validate($request, ["symbol" => "required","name" => "required","address" => "required", "photo" => "required"], ["name.required" => "Vui lòng nhập tiêu đề","address.required" => "Vui lòng nhập địa chỉ ví","photo.required" => "Vui lòng thêm hình ảnh","symbol.required" => "Vui lòng chọn biểu tượng tiền điện tử."]);
        $crypto = new Crypto_Model;
        $crypto->name = $request->name;
        $crypto->address = $request->address;
        $crypto->status = $request->status;
        $crypto->symbol = $request->symbol;
        if ($request->hasFile('photo')) {
            $file = $request->photo;
            $file_name = Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());
                $thumb_size = json_decode($settings["THUMB_SIZE_CRYPTO"]);
                $image_resize->fit($thumb_size->width, $thumb_size->height);
                $image_resize->save('public/upload/images/crypto/thumb/' . $file_name);
            }
            // close upload image
            $file->move("public/upload/images/crypto/large", $file_name);
            //save database
            $crypto->image = $file_name;
        }
        if ($crypto->save()) {
            return back()->with(["type" => "success", "flash_message" => "Thêm thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function edit($id = 0) {
        if (!Gate::allows('edit', explode("\\", get_class())[4])) {
            abort(403);
        }
        // $url_crypto_name = 'https://api.coincap.io/v2/assets';
        // $api_crypto_name =  file_get_contents($url_crypto_name);
        // $name = json_decode($api_crypto_name, true);
        $client = new CoinGeckoClient();
        $name = $client->coins()->getMarkets('usd');

        $url = 'https://api.binance.com/api/v3/ticker/price';
        $api =  file_get_contents($url);
        $symbol = json_decode($api, true);
        
        $settings = config('global.settings');
        $data = Crypto_Model::find($id);
        $url_price = 'https://api.binance.com/api/v3/ticker/price?symbol='.$data->symbol;
        $api_price =  file_get_contents($url_price);
        $data_price = json_decode($api_price, true);

        $row = json_decode(json_encode([
            "title" => "Crypto - Cập nhật",
            "desc" => "Cập nhật",
        ]));
        return view("Dashboard::crypto.edit", compact("row", "data","settings","symbol","data_price","name"));
    }

    public function postEdit(Request $request, $id = 0) {
        $settings = config('global.settings');
        $this->validate($request, ["symbol" => "required","name" => "required","address" => "required"], ["name.required" => "Vui lòng nhập tiêu đề","address.required" => "Vui lòng nhập địa chỉ ví","symbol.required" => "Vui lòng chọn biểu tượng tiền điện tử."]);
        $crypto = Crypto_Model::find($id);
        $crypto->name = $request->name;
        $crypto->address = $request->address;
        $crypto->status = $request->status;
        $crypto->symbol = $request->symbol;
        if ($request->hasFile('photo')) {
            //delete if exist
            $image = str_replace("\\", "/", base_path()) . '/public/upload/images/crypto/large/' . $crypto->image;
            if (file_exists($image)) {
                File::delete($image);
            }
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/crypto/thumb/' . $crypto->image;
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }
            $file = $request->photo;
            $file_name = Str::slug(explode(".", $file->getClientOriginalName())[0], "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());
                $thumb_size = json_decode($settings["THUMB_SIZE_CRYPTO"]);
                $image_resize->fit($thumb_size->width, $thumb_size->height);
                $image_resize->save('public/upload/images/crypto/thumb/' . $file_name);
            }

            $file->move("public/upload/images/crypto/large", $file_name);
            $crypto->image = $file_name;
        }
        if ($crypto->save()) {
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
            $crypto = Crypto_Model::find($list_id[0]->id);
            $crypto->status = 2; //2 is trash
            if ($crypto->save()) {
                return redirect()->route("admin.crypto")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $crypto = Crypto_Model::find($value->id);
                $crypto->status = 2; //2 is trash
                $crypto->save();
            }
            return redirect()->route("admin.crypto")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0) {
        $crypto = Crypto_Model::find($id);
        $crypto -> status = $status;
        if ($crypto->save()) {
            return redirect()->route("admin.crypto")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
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
            "title" => "Thùng rác - Crypto",
        ]));
        return view("Dashboard::crypto.trash", compact("row", "data"));
    }

    public function trashDelete($id = "") {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
            $data = Crypto_Model::where("id", $list_id[0]->id)->first();
            $image_large = str_replace("\\", "/", base_path()) . '/public/upload/images/crypto/large/' . $data->image;
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/crypto/thumb/' . $data->image;
            if (file_exists($image_large)) {
                File::delete($image_large);
            }
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }
            $slide = Crypto_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}