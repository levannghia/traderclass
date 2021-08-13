<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Dashboard\Controllers\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LogInto extends Controller
{
    public function index()
    {
        $row = json_decode(json_encode([
            "title" => "Log Into",
        ]));

        return view('Sites::log_into.index', compact('row'));
    }
    public function course_selection()
    {
        $row = json_decode(json_encode([
            "title" => "Course Selection",
        ]));

        return view('Sites::course_selection.index', compact('row'));
    }
}