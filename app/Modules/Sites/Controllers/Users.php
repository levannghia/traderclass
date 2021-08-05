<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

//use App\Modules\Sites\Models\Users_Model;
class Users extends Controller
{

    public function __construct()
    {
        
    }

    public function login()
    {
        if (Auth::guard("web")->check()) {
            return redirect()->route("home.index");
        }
        return view("Sites::users.login");
    }

    public function login_request(Request $request)
    {
        $this->validate($request, [
            "email" => "required",
            "password" => "required",
        ], [
            "email.required" => "Vui lòng nhập email",
            "password.required" => "Vui lòng nhập mật khẩu",
        ]);
        $auth = array(
            'email' => $request->email,
            'password' => $request->password,
        );
        if (Auth::guard("web")->attempt($auth, $remember = true)) {
            return redirect()->route("home.index");
        } else {
            return redirect()->route("users.login")->with(["type" => "danger", "flash_message" => "Email hoặc mật khẩu không đúng"]);
        }
    }

    public function logout(){
        Auth::guard("web")->logout();
        if (!Auth::guard("web")->check()) {
            return redirect()->route("users.login");
        }
    }
}
