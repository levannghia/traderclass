<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Modules\Sites\Models\Users_Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class Account extends Controller
{
    public function index()
    {
        $user = auth::user();
        $row = json_decode(json_encode([
            "title" => "Account information",
        ]));
        return view('Sites::account.index',compact('row','user'));
    }
    public function UpdatePassword_request(Request $request)
    {
        $this->validate($request, [
            "password_current" => "required",

            "password_new" => "required",
            "password_verify" => "same:password_new"

        ], [
            "password_current.required" => "Vui lòng nhập mật khẩu hiện tại",

            "password_new.required" => "Vui lòng nhập mật khẩu mới",
            "password_verify.same" => "Mật khẩu không khớp"

        ]);
        $data = $request->all();
        $user = auth::user();
        $hashedPassword = $user->password;
        if (Hash::check($data['password_current'], $hashedPassword)) {
            // The passwords match...
            $updatepassword = Users_Model::where('email',$user->email)->first();
            $updatepassword->password =  Hash::make($data['password_new']);
            $updatepassword->update();
            Auth::loginUsingId($updatepassword->id);
            return redirect()->back()->with('message', 'Cập nhập mật khẩu thành công ');
        }
        else{

            return redirect()->back()->with('message', 'Mật khẩu hiện tại không đúng, Cập nhập thất bại');
        }
    }

    public function UpdateEmail_request(Request $request)
    {
        $this->validate($request, [
            "password_current" => "required",

            "email_new" => "required",
            "email_verify" => "same:email_new"

        ], [
            "password_current.required" => "Vui lòng nhập mật khẩu hiện tại",

            "email_new.required" => "Vui lòng email mới",
            "email_verify.same" => "Email không khớp"

        ]);
        $data = $request->all();
        $user = auth::user();
        $hashedPassword = $user->password;
        if (Hash::check($data['password_current'], $hashedPassword)) {
            // The passwords match...

            $checkEmail = Users_Model::where('email', $data['email_new'])->first();
            if ($checkEmail) {
                session()->flash('message', 'Email đã tồn tại');
                return redirect()->back();
            } else {
                $token_random = Str::random();
                $titlename = "Update Email";
                $link_updateEmail = url('/updateEmail?emailnew=' . $data['email_new'] . '&token=' . $token_random . '&emailcurrent=' . $user->email);

                $data_new = array("fullname" => $user->fullname, "linkreset" => $link_updateEmail, 'email' => $data['email_new']);
    
                Mail::send("Sites::Mail.updateMail", ['data' => $data_new], function ($message) use ($titlename, $data_new) {
    
                    $message->to($data_new['email']);
                    $message->subject($titlename);
                    $message->from($data_new['email'], $titlename);
                });
                session()->flash('message', 'Chúng tôi đã gửi đến email mới, bạn hãy xác nhận để hoàn tất thay đổi email ');
                return redirect()->back();
            }

            // $updateEmail = Users_Model::where('email',$user->email)->first();
           
            // Auth::loginUsingId($updateEmail->id);
            // return redirect()->back()->with('message', 'Cập nhập email thành công ');
        }
        else{

            return redirect()->back()->with('message', 'Mật khẩu hiện tại không đúng, Email Cập nhập thất bại');
        }
    }
    public function UpdateEmail_accuracy()
    {
        $email_new = $_GET['emailnew'];
        $email_current = $_GET['emailcurrent'];
        $updateEmail =  Users_Model::where('email', $email_current)->first();
        $updateEmail->email = $email_new;
        $updateEmail->update();
        Auth::loginUsingId($updateEmail->id);
        session()->flash('message', 'Thay đổi email thành công');
        
        return redirect()->route("sites.account.index");

    }
    public function UpdateInformation_request(Request $request)
    {
        $information = $request->all();
        $user = auth::user();
        $check = Users_Model::where('email',$user['email'])->first();
       
        if ($request->file('selectedFile')) {
            $image = str_replace("\\", "/", base_path()) . '/public/upload/images/users/large/' . $check->photo;
            if (file_exists($image)) {
                File::delete($image);
            }
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/users/thumb/' . $check->photo;
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }

            $file = $request->selectedFile;
            $file_name = Str::slug(explode(".", $file->getClientOriginalName())[0], "-") . "-" . time() . "." . $file->getClientOriginalExtension();
             //$file_name = Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();

            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());

                $image_resize->fit(100, 100);

                $image_resize->save('public/upload/images/users/thumb/' . $file_name);
            }

            $file->move("public/upload/images/users/large", $file_name);
            $check->photo = $file_name;
        }
       
         $check->fullname =  $information['name'] . ''.  $information['lastname'] ;
         $check->address =  $information['address'];
         $check->update();
         return redirect()->back()->with('message', 'Cập nhập thông tin thành công');
       
    }
}