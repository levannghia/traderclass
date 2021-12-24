<?php

namespace App\Modules\API\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Modules\Dashboard\Models\Order_Model;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\This;
use Symfony\Component\VarDumper\Cloner\Data;

class OrderTransaction extends Controller
{
    public function giaoHangTC($id)
    {
        $order = Order_Model::find($id);
        if(!empty($order)){
            $order->status = 2;
            if($order->save()){
                return response()->json([
                    'code' => 200,
                    'status' => true,
                    'msg' => 'cap nhat thanh cong don hang',
                ]);
            }else{
                return response()->json([
                    'code' => 500,
                    'status' => false,
                    'msg' => 'don hang cap nhat that bai',
                ]);
            }
        }
        return response()->json([
            'code' => 404,
            'status' => false,
            'msg' => 'khong tim thay don hang nay',
        ]);
        
    }

    public function giaoHangTB($id)
    {
        $order = Order_Model::find($id);
        if(!empty($order)){
            $order->status = 3;
            if($order->save()){
                return response()->json([
                    'code' => 200,
                    'status' => true,
                    'msg' => 'cap nhat thanh cong don hang',
                ]);
            }else{
                return response()->json([
                    'code' => 500,
                    'status' => false,
                    'msg' => 'don hang cap nhat that bai',
                ]);
            }
        }
        return response()->json([
            'code' => 404,
            'status' => false,
            'msg' => 'khong tim thay don hang nay',
        ]);
        
    }
}