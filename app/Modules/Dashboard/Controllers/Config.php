<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Modules\Dashboard\Models\Config_Model;
use Illuminate\Support\Facades\Gate;
use App\Modules\Dashboard\Rules\Permission;
use Illuminate\Support\Facades\DB;

class Config extends Controller
{

    public function __construct()
    {
        //$className = explode("\\", get_class())[4];

    }

    public function setting()
    {

        $data = DB::table('config')->whereIn('name', ['LINK_YOUTUBE', 'LINK_FACEBOOK', 'LINK_INSTAGRAM', 'LINK_LINKEDIN', 'LINK_TWITTER', 'CHPLAY_LINK', 'APPLE_STORE_LINK'])->get();
        $logo = Config_Model::find(16);
        $row = json_decode(json_encode([
            "title" => "Config - setting",
            "desc" => "Setting"
        ]));
        return view("Dashboard::config.setting", compact("row", "data", "logo"));
    }

    public function postSetting(Request $request)
    {
        $config_link_youtube = Config_Model::find(6);
        $config_link_youtube->value = $request->LINK_YOUTUBE;

        $config_link_facebook = Config_Model::find(7);
        $config_link_facebook->value = $request->LINK_FACEBOOK;

        $config_link_instagram = Config_Model::find(8);
        $config_link_instagram->value = $request->LINK_INSTAGRAM;

        $config_link_linkedin = Config_Model::find(9);
        $config_link_linkedin->value = $request->LINK_LINKEDIN;

        $config_link_twitter = Config_Model::find(10);
        $config_link_twitter->value = $request->LINK_TWITTER;

        $config_chplay_link = Config_Model::find(37);
        $config_chplay_link->value = $request->CHPLAY_LINK;

        $config_apple_store_link = Config_Model::find(38);
        $config_apple_store_link->value = $request->APPLE_STORE_LINK;
        
        $config_photo_logo = Config_Model::find(16);
        if ($request->file('PHOTO_LOGO')) {
            //delete if exist
            $image = str_replace("\\", "/", base_path()) . '/public/upload/images/logo/' . $config_photo_logo->value;
            if (file_exists($image)) {
                File::delete($image);
            }

            $get_file_name = $request->file('PHOTO_LOGO')->getClientOriginalName();
            $file_name = current(explode('.',$get_file_name));
            $file_extension=$request->file('PHOTO_LOGO')->getClientOriginalExtension();
            $new_image = $file_name.'-'.time().'.'.$file_extension;
            $request->file('PHOTO_LOGO')->move('public/upload/images/logo', $new_image);
            $config_photo_logo->value = $new_image;
        }
        //DB::table('config')->where('name', 'LINK_YOUTUBE')->update(['value' => $request->LINK_YOUTUBE])
        //$config_link_youtube->save()
        //$a = DB::table('config')->whereIn('id', [6,7,8,9,10,16,38,39])->update(['value' => request('value')]);
        if ($config_link_youtube->save() && $config_link_facebook->save() && $config_link_instagram->save() && $config_link_linkedin->save() && $config_link_twitter->save() && $config_chplay_link->save() && $config_apple_store_link->save() && $config_photo_logo->save()) {
            return back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }
}
