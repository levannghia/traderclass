<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Modules\Sites\Models\Users_Model;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Hash;

class Users extends Controller
{

    public function __construct()
    {
    }

    public function login()
    {
        if (Auth::guard("web")->check()) {
            return redirect()->route("sites.home.index");
        }
        return redirect()->route("sites.home.index");
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

            $user = Users_Model::where('email', $auth['email'])->first();

            $titlename = "Đăng ký tài khoản";
            $token_random = Str::random();
            if ($user->status === 0) {
                $link_register = url('/registerpassword?email=' . $user->email . '&token=' . $token_random);

                $data = array("fullname" => $user->fullname, "linkreset" => $link_register, 'email' => $user->email);

                Mail::send("Sites::Mail.registerpassword_mail", ['data' => $data], function ($message) use ($titlename, $data) {

                    $message->to($data['email']);
                    $message->subject($titlename);
                    $message->from($data['email'], $titlename);
                });

                session()->flash('message', 'Bạn cần xác thực tài khoản, chúng tôi đã gửi mã xác thực vào email của bạn, hãy kiểm tra và làm theo hướng dẫn.');
                $this->logout();
                return redirect()->route('sites.home.index');
            }
            return redirect()->back();
        } else {

            return redirect()->route("sites.home.index")->with(["type" => "danger", "flash_message" => "Email hoặc mật khẩu không đúng"]);
        }
    }
    public function GoogleLogin(Request $request)
    {

        $checkUser = Users_Model::where('email', $request->_email)->first();
        if ($checkUser) {

            $checkUser->email = $request->_email;
            $checkUser->fullname = $request->displayName;
            $checkUser->save();
            Auth::loginUsingId($checkUser->id, true);
            response()->json([
                "status" => "success"
            ]);
            if ("status" == "success") {
                return redirect()->route("sites.home.index");
            } else {
                return redirect()->route("sites.home.index");
            }
        } else {
            $user = new Users_Model;
            $user->email = $request->_email;
            $user->fullname = $request->displayName;
            $user->photo = $request->photo;
            $user->type = 0;
            $user->status = 1;
            $user->save();
            Auth::loginUsingId($user->id, true);
            response()->json([
                "status" => "success"
            ]);
            if ("status" == "success") {
                return redirect()->route("sites.home.index");
            } else {
                return redirect()->route("sites.home.index");
            }
        }
    }

    public function create()
    {

        return View("Sites::users.register");
    }

    public function create_request(Request $request)
    {
        $titlename = "Đăng ký tài khoản";

        $validate = $this->validate($request, [
            "email" => "required|email",

            "password" => "required",

        ], [
            "email.required" => "Vui lòng nhập email",

            "password.required" => "Vui lòng nhập mật khẩu",

        ]);
        $checkEmail = Users_Model::where('email', $request->email)->first();
        if ($checkEmail) {
            session()->flash('message', 'Tạo tài khoản thất bại');
            return redirect()->route("sites.home.index");
        } else {
            $token_random = Str::random();
            $user = new Users_Model;
            $user->email =  $request->email;
            // $user->fullname =  $request->fullname;
            // $user->gender =  $request->gender;
            //$user->address =  $request->address;
            // $user->phone =  $request->phone;
            $user->password =  Hash::make($request->password);
            $user->type =  0;
            $user->status = 0;
            $user->save();
            $check = Users_Model::find($user->id);
            //send mail
            $email =  $check->email;

            $link_register = url('/registerpassword?email=' . $email . '&token=' . $token_random);

            $data = array("fullname" => $check->fullname, "linkreset" => $link_register, 'email' => $check->email);

            Mail::send("Sites::Mail.registerpassword_mail", ['data' => $data], function ($message) use ($titlename, $data) {

                $message->to($data['email']);
                $message->subject($titlename);
                $message->from($data['email'], $titlename);
            });
            session()->flash('message', 'Bạn cần xác nhận email để đăng ký thành công');
            return redirect()->route("sites.home.index");
        }
    }
    public function register_accuracy(Request $request)
    {
        $email = $_GET['email'];
        $checkEmail =  Users_Model::where('email', $email)->first();
        $checkEmail->status = 1;
        $checkEmail->save();
        session()->flash('message', 'Xác thực thành công');
        return redirect()->route("sites.home.index");
    }

    public function forgotpassword()
    {
        return View("Sites::inc.popupAccount");
    }
    public function forgotpasswordrequest(Request $request)
    {
        $data = $request->all();
        $titlename = "Lấy lại mật khẩu";
        $checkUser = Users_Model::where('email', $request->email)->first();
        if ($checkUser) {
            $token_random = Str::random();
            $user = Users_Model::find($checkUser->id);
            $user->forgotpassword_token = $token_random;
            $user->save();

            //Send mail
            $email = $data['email'];
            $link_resetpass = url('/update-password?email=' . $email . '&token=' . $token_random);

            $data = array("fullname" => $user->fullname, "linkreset" => $link_resetpass, 'email' => $data['email']);

            Mail::send("Sites::Mail.forgotpassword_mail", ['data' => $data], function ($message) use ($titlename, $data) {

                $message->to($data['email']);
                $message->subject($titlename);
                $message->from($data['email'], $titlename);
            });
            return redirect()->back()->with('message', 'gửi mail thành công, vui lòng vào check mail để resetpassword');
        } else {
            return redirect()->back()->with('message', 'Mail chưa được đăng ký');
        }
    }
    public function updatepassword()
    {
        return View("Sites::resetpassword.index");
    }

    public function logout()
    {
        Auth::guard("web")->logout();
        if (!Auth::guard("web")->check()) {
            return redirect()->route("sites.home.index");
        }
    }

    public function updatepassword_request(Request $request)
    {
        
        $data = $request->all();
        $token_random = Str::random();
        $checkUser = Users_Model::where('email', $data['email'])->where('forgotpassword_token', $data['token'])->get();
        $count = $checkUser->count();
        if ($count > 0) {
            foreach ($checkUser as $value) {
                $user_id = $value->id;
            }
            $updatepassword = Users_Model::find($user_id);
            $updatepassword->password =  Hash::make($data['pass-new']);
            $updatepassword->forgotpassword_token = $token_random;
            $updatepassword->save();
            return redirect()->route('sites.home.index')->with('message', 'Mật khẩu đã được cập nhập, vui lòng đăng nhập lại');
        } else {
            return redirect()->route('sites.home.index')->with('message', 'Link đã quá hạn');
        }
    }
}
