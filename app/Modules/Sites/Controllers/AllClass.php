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
        $all_class = DB::table('course')->select('teacher_id','course.id','fullname','name','course.status','course.created_at','course.updated_at','teachers.photo')->join('teachers', 'teachers.id', '=', 'course.teacher_id')->orderBy('course.id', 'desc')->get();
        $row = json_decode(json_encode([
            "title" => "All class",
        ]));

        return view('Sites::all_class.index', compact('row','all_class','user'));
    }
}