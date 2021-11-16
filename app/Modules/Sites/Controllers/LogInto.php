<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Dashboard\Controllers\Course;
use Illuminate\Support\Facades\DB;
use CodeItNow\BarcodeBundle\Utils\QrCode;
use App\Modules\Sites\Models\PaymentCrypto_Model;
use App\Modules\Sites\Models\Teachers_Model;
use App\Modules\Sites\Models\Crypto_Model;
use Illuminate\Support\Facades\Redirect;
use Cart;
use PhpOption\Option;

class LogInto extends Controller
{
    public function index()
    {
        $crypto_erc20 = Crypto_Model::where('method',0)->whereIn('status',[0,1])->orderBy('id', 'desc')->get();
        $crypto_bep20 = Crypto_Model::where('method',1)->whereIn('status',[0,1])->orderBy('id', 'desc')->get();
        $crypto_trc20 = Crypto_Model::where('method',2)->whereIn('status',[0,1])->orderBy('id', 'desc')->get();
        $row = json_decode(json_encode([
            "title" => "Log Into",
        ]));
        return view('Sites::log_into.index', compact('row', 'crypto_erc20','crypto_bep20','crypto_trc20'));
    }

    public function selection(){
        $crypto = Crypto_Model::whereIn('status',[0,1])->orderBy('id', 'desc')->get();
        $row = json_decode(json_encode([
            "title" => "Course Selection",
        ]));
        
        return view('Sites::course_selection.index', compact('row','crypto'));
    }

    public function course_selection(Request $request)
    {
       
        $id = $request->id;
        $course = DB::table('course')->select('course.name','teachers.fullname','teachers.position','course.price','teachers.photo','course.id')->join('teachers','teachers.id','=','course.teacher_id')->where('course.id',$id)->first();
        $data['id'] = $course->id;
        $data['qty'] = 1;
        $data['weight'] = $course->price;
        $data['options']['size'] = $course->position;
        $data['name'] = $course->name;
        $data['price'] = $course->price;
        $data['options']['image'] = $course->photo;
        Cart::add($data);
        return Redirect::to('/log-into/selection');
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
    public function payment_ecash($id)
    {
        $crypto = PaymentCrypto_Model::find($id);
        // $url = 'https://api.binance.com/api/v3/ticker/price?symbol=' . $crypto->symbol;
        // $api =  file_get_contents($url);
        // $data = json_decode($api, true);
        // $crypto->amount = round($crypto->currency / $data['price'],4);
        // //QR code
        // $qrCode = new QrCode();
        // $qrCode
        //     ->setText($crypto->cryptocurrency_name . ':' . $crypto->address . '?amount=' . round($crypto->currency / $data['price'],4))
        //     ->setSize(140)
        //     ->setPadding(10)
        //     ->setErrorCorrection('high')
        //     ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
        //     ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
        //     ->setLabel('Scan Qr Code')
        //     ->setLabelFontSize(16)
        //     ->setImageType(QrCode::IMAGE_TYPE_PNG);

        // $crypto->image_qr = 'data:' . $qrCode->getContentType() . ';base64,' . $qrCode->generate();
        $apiKey = 'A688XZPSE3VZUQDXUZX5DNT7YCMXIJKGXI';
        $address = '0xa17d23d3d376266053fba25a01f3481a19a2bae2';
        $url = 'https://api.bscscan.com/api?module=account&action=txlist&address='.$address.'&startblock=0&endblock=99999999&page=1&offset=10&sort=desc&apikey='.$apiKey;
        $api =  file_get_contents($url);
        $data = json_decode($api, true);
        foreach($data['result'] as $key => $value){
            $price = $value['value'] * pow(10,-18);
            if((float)$crypto->amount <= $price)
            {
                //kiem tra trang thai giao dich
                //https://api.bscscan.com/api?module=transaction&action=gettxreceiptstatus&txhash=0xe9975702518c79caf81d5da65dea689dcac701fcdd063f848d4f03c85392fd00&apikey=YourApiKeyToken
                $url_check = 'https://api.bscscan.com/api?module=transaction&action=gettxreceiptstatus&txhash='.$value['hash'].'&apikey='.$apiKey;
                $api_check =  file_get_contents($url_check);
                $data_check = json_decode($api_check, true);
                $crypto->status = $data_check['result']['status'];
                $crypto->save();
            }
        }
        if($crypto->status==0){
            header("Refresh:10");
        }
        return view('Sites::payment_ecash.index',compact('crypto'));
    }
}