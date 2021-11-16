<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Modules\Sites\Models\Teachers_Model;

class Register extends Controller
{
    public function index($id)
    {
        $course = DB::table('course')->select('teachers.fullname','course.price','course.id','course.created_at','course.updated_at')->join('teachers','teachers.id','=','course.teacher_id')->where('course.id',$id)->first();
        $count_video = DB::table('video_course')->where('id_course',$id)->count();
        $row = json_decode(json_encode([
            "title" => "Register",
        ]));
        return view('Sites::register.index',compact('row','course','count_video'));
    }
}