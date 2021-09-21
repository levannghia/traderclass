<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Dashboard\Controllers\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Modules\Sites\Models\Course_Model;
use Validator;
use Carbon\Carbon;

class AllClass extends Controller
{
    public function index()
    {
        $user = auth::user();
        $data = DB::table('course')->select('teachers.fullname','course.id','course.name','title','course.status','course.created_at','course.updated_at','course.photo')->join('course_category','course_category.id','=','course.course_category_id')->join('teachers', 'teachers.id', '=', 'course.teacher_id')->orderBy('course.id', 'desc')->paginate(12);
        $row = json_decode(json_encode([
            "title" => "All class",
        ]));

        return view('Sites::all_class.index', compact('row','data','user'));
    }
}