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
        return view('Sites::all_teacher.index',compact('row','data'));
    }
}