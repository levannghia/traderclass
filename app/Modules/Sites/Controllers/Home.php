<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Dashboard\Models\CourseCategory_Model as ModelsCourseCategory_Model;
use Illuminate\Support\Facades\Auth;
use App\Modules\Sites\Models\Testimonials_Model;
use App\Modules\Sites\Models\Teachers_Model;
use App\Modules\Sites\Models\Faq_Model;
use App\Modules\Sites\Models\Config_Model;
use App\Modules\Sites\Models\CourseCategory_Model;
use App\Modules\Sites\Models\Subcribe_Model;
use Illuminate\Support\Facades\DB;
use Validator;
use Carbon\Carbon;

class Home extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {   
        $config_link_youtube = Config_Model::find(6);
        $config_link_facebook = Config_Model::find(7);
        $config_link_instagram = Config_Model::find(8);
        $config_link_linkedin = Config_Model::find(9);
        $config_link_twitter = Config_Model::find(10);
        $config_chplay_link = Config_Model::find(37);
        $config_apple_store_link = Config_Model::find(38);
        $course_category = CourseCategory_Model::orderBy('id', 'desc')->get();
        $faq = Faq_Model::orderBy('id', 'desc')->get();
        $testimonials = Testimonials_Model::orderBy('id', 'desc')->get();
        $teachers = Teachers_Model::orderBy('id', 'desc')->get();
        return view("Sites::home.index", compact("course_category","teachers","testimonials","faq","config_link_youtube","config_link_facebook","config_link_instagram","config_link_linkedin","config_link_twitter","config_chplay_link","config_apple_store_link"));
    }
    
    public function postSubcribe(Request $request)
    {
        // $this->validate($request, ["email" => "required", "course_category_id" => "required"], ["course_category_id.required" => "Vui lòng chọn khóa học", "email.required" => "Vui lòng nhập email"]);
        // $subcribe = new Subcribe_Model;
        // $subcribe->email = $request->email;
        // $subcribe->course_category_id = implode(',',$request->course_category_id);
        // $subcribe->save();
        
        // return back()->with(["type" => "success", "flash_message" => "Gửi thành công!"]);
        $validator = Validator::make($request->all(),[
            "email" => "required|email", 
            "course_category_id" => "required",
            "agree_chk" => "required",
        ],["course_category_id.required" =>"* Please choice one", "email.required"=>"* Please enter your email",
            "email.email"=>"* Please enter your email","agree_chk.required" => "* Please choice"]);

        if(!$validator->passes())
        {
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }
        else{
            $value = [
                'email' => $request->email,
                'course_category_id' => implode(',',$request->course_category_id),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ];
            $query = DB::table('subcribe')->insert($value);

            if($query){
                return response()->json(['status'=>1,'msg'=>'Gui thanh cong']);
            }
        }
    }

}
