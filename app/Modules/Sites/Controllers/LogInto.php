<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Dashboard\Controllers\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Modules\Sites\Models\Teachers_Model;
use App\Modules\Sites\Models\Crypto_Model;

class LogInto extends Controller
{
    public function index()
    {
        $crypto = Crypto_Model::orderBy('id', 'desc')->get();
        $row = json_decode(json_encode([
            "title" => "Log Into",
        ]));
        return view('Sites::log_into.index', compact('row', 'crypto'));
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
        require "init.php";
        //$USD = $request->USD;
        $email = Auth::user()->email;

        $scurrency = "VND";
        $rcurrency = "BTC";
        $bacsiInfor = $coin->GetBasicProfile();
        $username = $bacsiInfor['result']['public_name'];
        $mang = [
            'amount' => 990000,
            'currency1' => $scurrency,
            'currency2' => $rcurrency,
            'buyer_email' => $email,
            'item' => "Test Thanh Toan",
            'address' => "",
            'ipn_url' => "traderclass.vn/webhook.php"
        ];

        $result = $coin->CreateTransaction($mang);
        //var_dump($result);

        if($result['error'] == "ok"){

        }
        else{
            print 'Error: '. $result['error'] . "\n";
            die();
        }
        //$teacher = Teachers_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Payment Ecash",
        ]));

        return view('Sites::payment_ecash.index', compact('row','result','rcurrency','scurrency'));
    }
}