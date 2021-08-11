<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Modules\Sites\Models\Config_Model;
use App\Modules\Sites\Models\Teachers_Model;

class Teacher extends Controller
{
    public function index($id)
    {
        $list_teacher = Teachers_Model::orderBy('id', 'desc')->limit(6)->get();
        $teacher = Teachers_Model::find($id);
        $row = json_decode(json_encode([
            "title" => $teacher->fullname,
        ]));
        return view('Sites::teacher.index',compact('row','teacher','list_teacher'));
    }
}