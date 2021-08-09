<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Modules\Sites\Models\Config_Model;

use Validator;
use Carbon\Carbon;

class Teacher extends Controller
{
    public function index($id)
    {
        $teacher = DB::table('teachers')->where('id',$id)->first();
        $row = json_decode(json_encode([
            "title" => "$teacher->fullname",
        ]));
        return view('Sites::teacher.index',compact('row','teacher'));
    }
}