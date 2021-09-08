<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use App\Modules\Dashboard\Models\Config_Model;
use Illuminate\Support\Facades\Gate;
use App\Modules\Dashboard\Rules\Permission;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Home extends Controller
{

    public function section1()
    {

        $data = DB::table('config')->whereIn('id', [42,43])->get();
        $video = Config_Model::find(65);
        $row = json_decode(json_encode([
            "title" => "Home - section 1",
            "desc" => "Setting"
        ]));
        return view("Dashboard::home.section1", compact("row", "data","video"));
    }

    public function postSection1(Request $request)
    {
        if (!Gate::allows('edit', explode("\\", get_class())[4])) {
            abort(403);
        }
        //mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts
        $this->validate($request, ["BANNER_TOP_VIDEO" => "mimes:mp4|max:100040"], [ "BANNER_TOP_VIDEO.max"=>"video có dung lượng quá lớn","BANNER_TOP_VIDEO.mimes"=>"Vui lòng chọn file có đuôi là *.mp4"]);
        $config_title_banner_top_left = Config_Model::find(42);
        $config_title_banner_top_left->value = $request->TITLE_BANNER_TOP_LEFT;

        $config_title_tuition = Config_Model::find(43);
        $config_title_tuition->value = $request->TITLE_BANNER_TOP_TUITION;

        $config_banner_top_video = Config_Model::find(65);

        if ($request->hasFile('BANNER_TOP_VIDEO')) {
            //delete if exist
            $video = str_replace("\\", "/", base_path()) . '/public/upload/videos/home_sites/' . $config_banner_top_video->value;
            if (file_exists($video)) {
                File::delete($video);
            }
            
            $file = $request->BANNER_TOP_VIDEO;
            $file_name = Str::slug(explode(".", $file->getClientOriginalName())[0], "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            $file->move("public/upload/videos/home_sites", $file_name);
            $config_banner_top_video->value = $file_name;

        }

        if ($config_title_banner_top_left->save() && $config_title_tuition->save() && $config_banner_top_video->save()) {
            return back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function section2()
    {

        $data = DB::table('config')->whereIn('id', [44,45,46,47,48,50,51])->get();
        $image = Config_Model::find(49);
        $row = json_decode(json_encode([
            "title" => "Home - section 2",
            "desc" => "Setting"
        ]));
        return view("Dashboard::home.section2", compact("row", "data","image"));
    }

    public function postSection2(Request $request)
    {
        if (!Gate::allows('edit', explode("\\", get_class())[4])) {
            abort(403);
        }
        $config_title_center_class = Config_Model::find(44);
        $config_title_center_class->value = $request->TITLE_BANNER_CENTER_CLASS;

        $config_title_center_funtion_1 = Config_Model::find(45);
        $config_title_center_funtion_1->value = $request->TITLE_BANNER_CENTER_FUNTION_1;

        $config_title_center_funtion_2 = Config_Model::find(46);
        $config_title_center_funtion_2->value = $request->TITLE_BANNER_CENTER_FUNTION_2;
        
        $config_title_center_funtion_3= Config_Model::find(47);
        $config_title_center_funtion_3->value = $request->TITLE_BANNER_CENTER_FUNTION_3;

        $config_title_center_funtion_4 = Config_Model::find(48);
        $config_title_center_funtion_4->value = $request->TITLE_BANNER_CENTER_FUNTION_4;
        $config_title_center_tuition = Config_Model::find(50);
        $config_title_center_tuition->value = $request->TITLE_BANNER_CENTER_TUITION;

        $config_title_center_payment = Config_Model::find(51);
        $config_title_center_payment->value = $request->TITLE_BANNER_CENTER_PAYMENT_TIME;

        $config_center_image = Config_Model::find(49);

        if ($request->hasFile('BANNER_CENTER_IMAGE')) {
            //delete if exist
            $image = str_replace("\\", "/", base_path()) . '/public/upload/images/sites_home/large/' . $config_center_image->value;
            if (file_exists($image)) {
                File::delete($image);
            }
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/sites_home/thumb/' . $config_center_image->value;
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }

            $file = $request->BANNER_CENTER_IMAGE;
            $file_name = Str::slug(explode(".", $file->getClientOriginalName())[0], "-") . "-" . time() . "." . $file->getClientOriginalExtension();

            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());

                $image_resize->fit(790, 480);

                $image_resize->save('public/upload/images/sites_home/thumb/' . $file_name);
            }

            $file->move("public/upload/images/sites_home/large", $file_name);
            $config_center_image->value = $file_name;
        }

        if ($config_title_center_class->save() && $config_title_center_funtion_1->save() && $config_title_center_funtion_2->save() && $config_title_center_funtion_3->save() && $config_title_center_funtion_4->save() && $config_title_center_tuition->save() && $config_title_center_payment->save() && $config_center_image->save()) {
            return back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function section3()
    {

        $data = DB::table('config')->whereIn('id', [53,54,55,56,57,58,59,60,61,62])->get();
        $image = Config_Model::find(52);
        $row = json_decode(json_encode([
            "title" => "Home - section 3",
            "desc" => "Setting"
        ]));
        return view("Dashboard::home.section3", compact("row", "data","image"));
    }

    public function postSection3(Request $request)
    {
        if (!Gate::allows('edit', explode("\\", get_class())[4])) {
            abort(403);
        }
        $config_title_bottom_class = Config_Model::find(53);
        $config_title_bottom_class->value = $request->TITLE_BANNER_BOTTOM_CLASS;

        $config_title_bottom_review_class = Config_Model::find(54);
        $config_title_bottom_review_class->value = $request->TITLE_BANNER_BOTTOM_REVIEW_CLASS;

        $config_title_bottom_lessons = Config_Model::find(55);
        $config_title_bottom_lessons->value = $request->TITLE_BANNER_BOTTOM_LESSONS;
        
        $config_title_bottom_review_lesson= Config_Model::find(56);
        $config_title_bottom_review_lesson->value = $request->TITLE_BANNER_BOTTOM_REVIEW_LESSON;

        $config_title_bottom_minutes = Config_Model::find(57);
        $config_title_bottom_minutes->value = $request->TITLE_BANNER_BOTTOM_MINUTES;

        $config_title_bottom_review_minute = Config_Model::find(58);
        $config_title_bottom_review_minute->value = $request->TITLE_BANNER_BOTTOM_REVIEW_MINUTES;

        $config_title_bottom_1 = Config_Model::find(59);
        $config_title_bottom_1->value = $request->TITLE_BANNER_BOTTOM_1;

        $config_title_bottom_2 = Config_Model::find(60);
        $config_title_bottom_2->value = $request->TITLE_BANNER_BOTTOM_2;

        $config_title_bottom_3 = Config_Model::find(61);
        $config_title_bottom_3->value = $request->TITLE_BANNER_BOTTOM_3;

        $config_title_bottom_4 = Config_Model::find(62);
        $config_title_bottom_4->value = $request->TITLE_BANNER_BOTTOM_4;

        $config_bottom_image = Config_Model::find(52);

        if ($request->hasFile('BANNER_BOTTOM_IMAGE')) {
            //delete if exist
            $image = str_replace("\\", "/", base_path()) . '/public/upload/images/sites_home/large/' . $config_bottom_image->value;
            if (file_exists($image)) {
                File::delete($image);
            }
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/sites_home/thumb/' . $config_bottom_image->value;
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }

            $file = $request->BANNER_BOTTOM_IMAGE;
            $file_name = Str::slug(explode(".", $file->getClientOriginalName())[0], "-") . "-" . time() . "." . $file->getClientOriginalExtension();

            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());

                $image_resize->fit(790, 233);

                $image_resize->save('public/upload/images/sites_home/thumb/' . $file_name);
            }

            $file->move("public/upload/images/sites_home/large", $file_name);
            $config_bottom_image->value = $file_name;
        }

        if ($config_title_bottom_class->save() && $config_title_bottom_review_class->save() && $config_title_bottom_lessons->save() &&$config_title_bottom_review_lesson->save() && $config_title_bottom_minutes->save() && $config_title_bottom_review_minute->save() && $config_title_bottom_1->save() && $config_title_bottom_2->save() && $config_title_bottom_3->save() && $config_title_bottom_4->save() && $config_bottom_image->save()) {
            return back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }
}
