<?php

namespace App\Modules\Sites\Controllers;

use CodeItNow\BarcodeBundle\Utils\QrCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;
use App\Modules\Sites\Models\PaymentCrypto_Model;
use App\Modules\Sites\Models\Crypto_Model;
use Cart;
use Illuminate\Support\Carbon;

class PaymentCrypto extends Controller
{
    public function payment()
    {
        $crypto = PaymentCrypto_Model::find(270);
        //https://api.bscscan.com/api?module=account&action=txlist&address=0xF426a8d0A94bf039A35CEE66dBf0227A7a12D11e&startblock=0&endblock=99999999&page=1&offset=10&sort=asc&apikey=YourApiKeyToken
        $apiKey = 'A688XZPSE3VZUQDXUZX5DNT7YCMXIJKGXI';
        $address = '0xa17d23d3d376266053fba25a01f3481a19a2bae2';
        $url = 'https://api.bscscan.com/api?module=account&action=txlist&address='.$address.'&startblock=0&endblock=99999999&page=1&offset=5&sort=desc&apikey='.$apiKey;
        $api =  file_get_contents($url);
        $data = json_decode($api, true);
        // foreach($data['result'] as $key => $value){
        //     $a = $value['value'] * pow(10,-18);
        //     //var_dump($a);
        //     if($a >= $crypto->amount)
        //     {
        //         //kiem tra trang thai giao dich
        //         //https://api.bscscan.com/api?module=transaction&action=gettxreceiptstatus&txhash=0xe9975702518c79caf81d5da65dea689dcac701fcdd063f848d4f03c85392fd00&apikey=YourApiKeyToken
        //         $url_check = 'https://api.bscscan.com/api?module=transaction&action=gettxreceiptstatus&txhash='.$value['hash'].'&apikey='.$apiKey;
        //         $api_check =  file_get_contents($url_check);
        //         $data_check = json_decode($api_check, true);
        //         $crypto->status = $data_check['result']['status'];
        //         $crypto->save();
        //         echo 'thanh cong';
        //     }
        // }
        return response()->json($data, 200);   
    }

    public function index()
    {
        $url = 'https://api.binance.com/api/v3/ticker/price';
        $api =  file_get_contents($url);
        $data = json_decode($api, true);
        // echo $data[0]['price'];
        return view('Sites::payment_crypto.index', compact('data'));
    }
    public function process()
    {
        //$data = $client->simple ()->getTokenPrice( 'ethereum' , '0xE41d2489571d322189246DaFA5ebDe1F4699F498' , 'usd, rub' );
        //$result = $client -> simple()->getPrice( '0x, bitcoin' , 'usd' );
        $client = new CoinGeckoClient();
        $data = $client->coins()->getMarkets('usd');
        $response = $client->getLastResponse();
        $headers = $response->getHeaders();

        return response()->json($data, 200);
    }

    public function postAdd(Request $request)
    {
        $crypto = new PaymentCrypto_Model();
        $crypto_id = Crypto_Model::find($request->id_crypto);
        
        $url = 'https://api.binance.com/api/v3/ticker/price?symbol=' . $crypto_id->symbol;
        $api =  file_get_contents($url);
        $data = json_decode($api, true);
        $id = $crypto->id;
        $crypto->id_crypto = $crypto_id->id;
        $crypto->link = "into/payment-ecash/" . $id;
        $crypto->symbol = $crypto_id->symbol;
        $crypto->created_at = Carbon::now();
        $crypto->updated_at = Carbon::now();
        $crypto->cryptocurrency_name = $crypto_id->name;
        $crypto->image_crypto = '/public/upload/images/crypto/thumb/' . $crypto_id->image;
        $crypto->address = $crypto_id->address;
        $crypto->email = Auth::user()->email;
        $crypto->currency = str_replace(',','',Cart::subtotal())/23000;
        $crypto->status = 0;
        $crypto->amount = round($crypto->currency / $data['price'],4);

        //QR code
        $qrCode = new QrCode();
        $qrCode
            ->setText($crypto->cryptocurrency_name . ':' . $crypto->address . '?amount=' . round($crypto->currency / $data['price'],4))
            ->setSize(140)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
            ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
            ->setLabel('Scan Qr Code')
            ->setLabelFontSize(16)
            ->setImageType(QrCode::IMAGE_TYPE_PNG);

        $crypto->image_qr = 'data:' . $qrCode->getContentType() . ';base64,' . $qrCode->generate();
        $crypto->save();
        //return response()->json($crypto, 200);
        return redirect()->route('sites.crypto.getUpdate', $crypto->id);
    }

    public function testJS(Request $request)
    {
        $crypto_id = Crypto_Model::find($request->id_crypto);
        
        $url = 'https://api.binance.com/api/v3/ticker/price?symbol=' . $crypto_id->symbol;
        $api =  file_get_contents($url);
        $data = json_decode($api, true);
        $json = array();

        $json['symbol'] = $crypto_id->symbol;
        $json['created_at'] = Carbon::now();
        $json['updated_at'] = Carbon::now();
        $json['cryptocurrency_name'] = $crypto_id->name;
        $json['image_crypto'] = '/public/upload/images/crypto/thumb/' . $crypto_id->image;
        $json['address'] = $crypto_id->address;
        $json['email'] = Auth::user()->email;
        $json['currency'] = str_replace(',','',Cart::subtotal())/23000;
        $json['status'] = 0;
        $json['amount'] = (str_replace(',','',Cart::subtotal())/23000) / $data['price'];

        //QR code
        $qrCode = new QrCode();
        $qrCode
            ->setText($crypto_id->name . ':' . $crypto_id->address . '?amount=' . round((str_replace(',','',Cart::subtotal())/23000) / $data['price'],4))
            ->setSize(140)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
            ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
            ->setLabel('Scan Qr Code')
            ->setLabelFontSize(16)
            ->setImageType(QrCode::IMAGE_TYPE_PNG);

        $json['image_qr'] = 'data:' . $qrCode->getContentType() . ';base64,' . $qrCode->generate();
        
        return response()->json($json, 200);
        
    }


    public function getUpdate($id)
    {
        $crypto = PaymentCrypto_Model::find($id);
        // $client = new CoinGeckoClient();
        // $data = $client->coins()->getMarkets('usd');
        $url = 'https://api.binance.com/api/v3/ticker/price?symbol=' . $crypto->symbol;
        $api =  file_get_contents($url);
        $data = json_decode($api, true);
        $crypto->amount = round($crypto->currency / $data['price'],4);
        //QR code
        $qrCode = new QrCode();
        $qrCode
            ->setText($crypto->cryptocurrency_name . ':' . $crypto->address . '?amount=' . round($crypto->currency / $data['price'],4))
            ->setSize(140)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
            ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
            ->setLabel('Scan Qr Code')
            ->setLabelFontSize(16)
            ->setImageType(QrCode::IMAGE_TYPE_PNG);

        $crypto->image_qr = 'data:' . $qrCode->getContentType() . ';base64,' . $qrCode->generate();
        $crypto->link = '/log-into/payment-ecash/' . $crypto->id;
        $crypto->updated_at = Carbon::now();
        // $response = $client->getLastResponse();
        // $headers = $response->getHeaders();
        $crypto->save();
        header("Refresh:10");
        return response()->json($crypto, 200);
        
    }
}
