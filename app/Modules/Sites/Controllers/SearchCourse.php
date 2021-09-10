<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Sites\Models\CourseCtagory_Model;
use Illuminate\Support\Facades\DB;


class SearchCourse extends Controller
{
    public function process(Request $request){
        require "init.php";
        $result ="";
        $USD = $request->USD;
        $Email = $request->email;
        // $Email = Auth::user()->email;

        $scurrency = "USD";
        $rcurrency = "BTC";
        $bacsiInfor = $coin->GetBasicProfile();
        $username = $bacsiInfor['result']['public_name'];
        $mang = [
            'amount' => $USD,
            'currency1' => $scurrency,
            'currency2' => $rcurrency,
            'buyer_email' => $Email,
            'item' => "Test Thanh Toan",
            'address' => "18mUEvqTAK7d8zqbpqUFgPweMS13fdxxnm",
            'ipn_url' => "traderclass.vn/webhook.php"
        ];

        $result = $coin->CreateTransaction($mang);
        var_dump($result);

        if($result['error'] == "ok"){

        }
        else{
            print 'Error: '. $result['error'] . "\n";
            die();
        }

        return view('Sites::terms.index3',compact('result','rcurrency','username'));
    }

    public function getIndex()
    {
        return view('Sites::terms.index2');
    }

    function postSearchAjax(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('course')->join('teachers', 'course.teacher_id', '=', 'teachers.id')
                ->where('name', 'LIKE', "%{$query}%")->orWhere('fullname', 'LIKE', "%{$query}%")
                ->get();
            // $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($data as $row) {
                $output = '
                <option value="'.$row->fullname.'">'.$row->name.'</option>';
            }
            echo $output;
        }
    }
}
