<?php

namespace App\Modules\Dashboard\Controllers;

use App\Modules\Dashboard\Models\Admins_Model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MyAccount extends Controller{

    public function __construct()
    {
       
    }

    public function index(){
        
    }

    public function change_password(){
        $row = json_decode(json_encode([
            "title" => "Change password",
        ]));
        return view("Dashboard::my_account.changepassword", compact("row"));
    }

    public function change_password_request(Request $request)
    {

        $this->validate($request, [
            'oldpassword' => 'required',
            'newpassword' => 'required|min:8',
            'confirmpassword' => 'required|same:newpassword',
        ], [
            'oldpassword.required'=>'Vui lòng nhập mật khẩu',
            'newpassword.required'=>'Vui lòng nhập mật khẩu mới',
            'newpassword.min'=>'Mật khẩu có ít nhất 8 ký tự',
            'confirmpassword.required'=>'Vui lòng xác nhận mật khẩu',
            'confirmpassword.same'=>'Mật khẩu xác nhận không chính xác',
        ]);

        if (Auth::guard("admin")->Check()) {
            $request_data = $request->All();
            $current_password = Auth::User('admin')->password;
            if (Hash::check($request_data['oldpassword'], $current_password)) {
                $admin_id = Auth::User('admin')->id;
                $admin = Admins_Model::find($admin_id);
                $admin->password = Hash::make($request_data['newpassword']);;
                $admin->save();
                return back()->with(["type" => "success", "flash_message" => "Lưu thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Mật khẩu không chính xác."]);
            }
        }
    }
   
}
