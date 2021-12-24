<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AllTeacher extends Controller
{
    public function index()
    { 
        $data = DB::table('teachers')->whereIn('status',[0,1])->orderBy('id', 'desc')->paginate(6);
        $row = json_decode(json_encode([
        "title" => "All Teacher",
        ]));
        //xac dinh teacher co ton tai trong bang course thong qua id
        // $a = DB::table('teachers')
        // ->whereExists(function ($query) {
        //     $query->select(DB::raw(1))
        //           ->from('course')
        //           ->whereRaw('la_course.teacher_id = la_teachers.id');
        // })
        // ->get();
        // dd($a);
        return view('Sites::all_teacher.index',compact('row','data'));
    }
}