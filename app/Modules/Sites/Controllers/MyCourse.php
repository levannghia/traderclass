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
        $row = json_decode(json_encode([
            "title" => "My course",
        ]));
        return view('Sites::my_course.index',compact('row'));
    }
}