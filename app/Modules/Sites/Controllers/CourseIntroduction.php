<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Modules\Sites\Models\Course_Model;

class CourseIntroduction extends Controller
{
    public function index($id=2)
    {
        $course = DB::table('course')->join('teachers', 'teachers.id', '=', 'course.teacher_id')->where('course.teacher_id',2)->whereIn('course.status', [0, 1])->first();
        $list_course = DB::table('course')->select('teachers.fullname','teachers.photo','teachers.position','course.id','course.id','course.video_id','course.teacher_id')->join('teachers', 'teachers.id', '=', 'course.teacher_id')->whereIn('course.status', [0, 1])->get();
        $row = json_decode(json_encode([
            "title" => "Course Introduction",
        ]));
        return view('Sites::course_introduction.index',compact('row','course','list_course'));
    }

    // public function intruduction($id)
    // {
    //     $list_course = DB::table('course')->select('teachers.fullname','teachers.photo','teachers.position','course.id','course.id','course.video_id','course.teacher_id')->join('teachers', 'teachers.id', '=', 'course.teacher_id')->where('course.teacher_id',$id)->whereIn('course.status', [0, 1])->get();
    //     $row = json_decode(json_encode([
    //         "title" => "Course Introduction",
    //     ]));
    //     return view('Sites::course_introduction.index',compact('row','list_course'));
    // }
}