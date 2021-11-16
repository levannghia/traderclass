<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Modules\Sites\Models\Course_Model;

class MyCourse extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $list_course = DB::table('course')->select('teachers.fullname', 'teachers.position','course.id', 'teachers.photo','course.course_category_id','course.name')->join('user_course','user_course.course_id','=','course.id')->join('teachers','teachers.id','=','course.teacher_id')->where('user_course.user_id',$id)->whereIn('course.status',[0,1])->get();
        $row = json_decode(json_encode([
            "title" => "My course",
        ]));

        // dd($list_course);
        // die;
        return view('Sites::my_course.index',compact('row','list_course'));
    }
}