<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Dashboard\Controllers\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Modules\Sites\Models\Teachers_Model;

class LogInto extends Controller
{
    public function index()
    {
        $row = json_decode(json_encode([
            "title" => "Log Into",
        ]));

        return view('Sites::log_into.index', compact('row'));
    }
    public function course_selection($id)
    {
        $teacher = Teachers_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Course Selection",
        ]));

        return view('Sites::course_selection.index', compact('row','teacher'));
    }
    public function payment_bank()
    {
        //$teacher = Teachers_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Payment Bank",
        ]));

        return view('Sites::payment_bank.index', compact('row'));
    }
    public function payment_atm()
    {
        //$teacher = Teachers_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Payment ATM",
        ]));

        return view('Sites::payment_atm.index', compact('row'));
    }
    public function payment_momo()
    {
        //$teacher = Teachers_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Payment Momo",
        ]));

        return view('Sites::payment_momo.index', compact('row'));
    }
    public function payment_ecash()
    {
        //$teacher = Teachers_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Payment Ecash",
        ]));

        return view('Sites::payment_ecash.index', compact('row'));
    }
}