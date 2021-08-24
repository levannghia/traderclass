<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Sites\Models\Testimonials_Model;
use App\Modules\Sites\Models\CourseCtagory_Model;
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

        $config_title_banner_top_left = Config_Model::find(42);
        $config_title_banner_top_tuition = Config_Model::find(43);
        $config_banner_top_video = Config_Model::find(65);
        $config_title_banner_center_class = Config_Model::find(44);
        $config_title_banner_center_funtion_1 = Config_Model::find(45);
        $config_title_banner_center_funtion_2 = Config_Model::find(46);
        $config_title_banner_center_funtion_3 = Config_Model::find(47);
        $config_title_banner_center_funtion_4 = Config_Model::find(48);
        $config_banner_center_image = Config_Model::find(49);
        $config_title_banner_center_tuition = Config_Model::find(50);
        $config_title_banner_bottom_center_payment = Config_Model::find(51);
        $config_banner_bottom_image = Config_Model::find(52);
        $config_title_banner_bottom_class = Config_Model::find(53);
        $config_title_banner_bottom_review_class = Config_Model::find(54);
        $config_title_banner_bottom_lessons = Config_Model::find(55);
        $config_title_banner_bottom_review_lessons = Config_Model::find(56);
        $config_title_banner_bottom_minite = Config_Model::find(57);
        $config_title_banner_bottom_review_minute = Config_Model::find(58);
        $config_title_banner_bottom_1 = Config_Model::find(59);
        $config_title_banner_bottom_2 = Config_Model::find(60);
        $config_title_banner_bottom_3 = Config_Model::find(61);
        $config_title_banner_bottom_4 = Config_Model::find(62);

        $course_category = CourseCategory_Model::orderBy('id', 'desc')->get();
        $faq = Faq_Model::orderBy('id', 'desc')->get();
        $testimonials = Testimonials_Model::orderBy('id', 'desc')->get();
        $teachers = Teachers_Model::orderBy('id', 'desc')->get();
        return view("Sites::home.index", compact(
            "course_category",
            "teachers",
            "testimonials",
            "faq",
            "config_link_youtube",
            "config_link_facebook",
            "config_link_instagram",
            "config_link_linkedin",
            "config_link_twitter",
            "config_chplay_link",
            "config_apple_store_link",
            "config_title_banner_top_left",
            "config_title_banner_top_tuition",
            "config_banner_top_video",
            "config_title_banner_center_class",
            "config_title_banner_center_funtion_1",
            "config_title_banner_center_funtion_2",
            "config_title_banner_center_funtion_3",
            "config_title_banner_center_funtion_4",
            "config_banner_center_image",
            "config_title_banner_center_tuition",
            "config_title_banner_bottom_center_payment",
            "config_banner_bottom_image",
            "config_title_banner_bottom_class",
            "config_title_banner_bottom_review_class",
            "config_title_banner_bottom_lessons",
            "config_title_banner_bottom_review_lessons",
            "config_title_banner_bottom_minite",
            "config_title_banner_bottom_review_minute",
            "config_title_banner_bottom_1",
            "config_title_banner_bottom_2",
            "config_title_banner_bottom_3",
            "config_title_banner_bottom_4",
        ));
    }

    public function postSubcribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "course_category_id" => "required",
            "agree_chk" => "required",
        ], [
            "course_category_id.required" => "* Please choice one", "email.required" => "* Please enter your email",
            "email.email" => "* Please enter your email", "agree_chk.required" => "* Please choice"
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $value = [
                'email' => $request->email,
                'course_category_id' => implode(',', $request->course_category_id),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ];
            $query = DB::table('subcribe')->insert($value);

            if ($query) {
                return response()->json(['status' => 1, 'msg' => 'Gui thanh cong']);
            }
        }
    }
}
