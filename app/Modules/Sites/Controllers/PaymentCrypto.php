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

class PaymentCrypto extends Controller
{
    public function index()
    {
        // $client = new CoinGeckoClient();
        // $data = $client->coins()->getMarkets('usd');
        $url = 'https://api.binance.com/api/v3/ticker/price';
        $api =  file_get_contents($url);
        $data = json_decode($api, true);
        // echo $data[0]['price'];
        return view('Sites::payment_crypto.index', compact('data'));
    }
    public function process()
    {
        $client = new CoinGeckoClient();

        $data = $client->coins()->getMarkets('usd');
        //$data = $client->simple ()->getTokenPrice( 'ethereum' , '0xE41d2489571d322189246DaFA5ebDe1F4699F498' , 'usd, rub' );
        //$result = $client -> simple()->getPrice( '0x, bitcoin' , 'usd' );
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

        $crypto->id_crypto = $crypto_id->id;
        //$crypto->image_crypto = $crypto_id->image;
        $crypto->symbol = $crypto_id->symbol;
        if ($crypto_id->symbol == 'BTCUSDT') {
            $crypto->cryptocurrency_name = 'bitcoin';
            
        } elseif ($crypto_id->symbol == 'ETHUSDT') {
            $crypto->cryptocurrency_name = 'ethereum';
        }
        $crypto->address = $crypto_id->address;
        $crypto->currency = 60;
        $crypto->status = 0;
        $crypto->amount = round($crypto->currency / $data['price'],4);

        //QR code
        $qrCode = new QrCode();
        $qrCode
            ->setText($crypto->cryptocurrency_name . ':' . $crypto->address . '?amount=' . round($crypto->currency / $data['price'],4))
            ->setSize(300)
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

    public function getUpdate($id)
    {
        $crypto = PaymentCrypto_Model::find($id);
        // $client = new CoinGeckoClient();
        // $data = $client->coins()->getMarkets('usd');
        $url = 'https://api.binance.com/api/v3/ticker/price?symbol=' . $crypto->symbol;
        $api =  file_get_contents($url);
        $data = json_decode($api, true);
        $crypto->status = 1;
        $crypto->amount = round($crypto->currency / $data['price'],4);
        //QR code
        $qrCode = new QrCode();
        $qrCode
            ->setText($crypto->cryptocurrency_name . ':' . $crypto->address . '?amount=' . round($crypto->currency / $data['price'],4))
            ->setSize(300)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
            ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
            ->setLabel('Scan Qr Code')
            ->setLabelFontSize(16)
            ->setImageType(QrCode::IMAGE_TYPE_PNG);

        $crypto->image_qr = 'data:' . $qrCode->getContentType() . ';base64,' . $qrCode->generate();
        // $response = $client->getLastResponse();
        // $headers = $response->getHeaders();
        $crypto->save();
        header("Refresh:10");
        return response()->json($crypto, 200);
        
    }
}
