<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Dashboard\Controllers\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Modules\Sites\Models\Config_Model;
use App\Modules\Sites\Models\Teachers_Model;
use App\Modules\Sites\Models\Faq_Model;
use Validator;
use Carbon\Carbon;

class Teacher extends Controller
{
    public function index($id)
    {
        $list_course = DB::table('course')->select('teachers.fullname', 'teachers.position','course.id', 'teachers.photo','course.course_category_id','course.name')->join('teachers','teachers.id','=','course.teacher_id')->whereIn('course.status',[0,1])->limit(6)->get();
        $course = DB::table('course')->select('teachers.fullname', 'course.id AS course_id', 'teachers.position','teachers.id', 'course.photo','course.course_category_id','course.id_video','course.created_at','course.updated_at','course.name')->join('teachers','teachers.id','=','course.teacher_id')->where('course.id',$id)->first();
        $video = DB::table('course')->select('course.id_video')->where('course.id',$id)->first();
        $faq = Faq_Model::orderBy('id', 'desc')->get();
        $list_video = DB::table('video_course')->whereIn('status',[0,1])->where('id_course',$id)->get();
        $hoc_vien = DB::table('user_course')->where('course_id',$id)->count();
        $row = json_decode(json_encode([
            "title" => $course->fullname,
        ]));
        return view('Sites::teacher.index',compact('row', 'list_course','faq','course','list_video','video','hoc_vien'));
    }

    public function video($id,$id_video)
    {
        $list_course = DB::table('course')->select('teachers.fullname', 'teachers.position','course.id', 'teachers.photo','course.course_category_id','course.name')->join('teachers','teachers.id','=','course.teacher_id')->whereIn('course.status',[0,1])->limit(6)->get();
        $course = DB::table('course')->select('teachers.fullname', 'teachers.position','teachers.id', 'course.photo','course.course_category_id','course.id_video AS video_id','course.created_at','course.id AS course_id','course.updated_at','course.name')->join('teachers','teachers.id','=','course.teacher_id')->where('course.id',$id)->first();
        $video = DB::table('video_course')->select('video_course.id_video')->join('course','course.id','=','video_course.id_course')->where('course.id',$id)->where('video_course.id',$id_video)->first();
        $faq = Faq_Model::orderBy('id', 'desc')->get();
        $list_video = DB::table('video_course')->whereIn('status',[0,1])->where('id_course',$id)->get();
        $hoc_vien = DB::table('user_course')->where('course_id',$id)->count();
        $row = json_decode(json_encode([
            "title" => $course->fullname,
        ]));
    
        return view('Sites::teacher.index',compact('row', 'list_course','faq','course','list_video','video','hoc_vien'));
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
                'course_category_id' => $request->course_category_id,
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