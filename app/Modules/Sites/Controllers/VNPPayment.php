<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Modules\Sites\Models\PaymentVNP_Model;
use App\Modules\Sites\Models\Order_Model;
use App\Modules\Sites\Models\UserCourse_Model;
use App\Modules\Sites\Models\Users_Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Cart;
use Illuminate\Support\Carbon;
use SebastianBergmann\Environment\Console;

class VNPPayment extends Controller
{
    public function create(Request $request)
    {
        //insert don hang
        $order = new Order_Model();
        $order->payment_method = 1;
        $order->user_id = Auth::user()->id;
        $order->total_price = Cart::subtotal();
        $order->status = 1;
        $order->created_at = Carbon::now();
        $order->updated_at = Carbon::now();
        $order->save();

        $VNP = new PaymentVNP_Model();
        session(['cost_id' => Auth::user()->id]);
        session(['url_prev' => url()->previous()]);
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://traderclass.local/return";
        $vnp_TmnCode = "RN2OHEIN";//Mã website tại VNPAY 
        $vnp_HashSecret = "GUBLOKIJHIRVCSSCFZZSJYESPJLANNXE"; //Chuỗi bí mật
        
        $vnp_TxnRef = random_int(1,99); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Ok thanh toan";
        $VNP->vnp_response_node = $vnp_OrderInfo;
        $VNP->status = 0;
        $VNP->order_id = $order->id;
        $vnp_OrderType = 150000;
        $vnp_Amount = str_replace(',','',Cart::subtotal()) * 100;
        $VNP->money = $vnp_Amount;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $VNP->code_bank = $vnp_BankCode;
        $VNP->user_id = Auth::user()->id;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $VNP->code_vnp = $vnp_IpAddr;
        //Add Params of 2.0.1 Version
        $vnp_ExpireDate = date("YmdHis");
        $VNP->save();
        session(['order_id' => $VNP->id]);
        //insert chi tiet don hang

        $data = array();
        foreach (Cart::content() as $item) {
            $data['order_id'] = $order->id;
            $data['course_id'] = $item->id;
            $data['quantity'] = $item->qty;
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            $order_detail = DB::table('order_detail')->insert($data);
        }

         //Gui mail xac nhan don hang thanh cong!
        // $data = $request->all();

        $titlename = "Đặt hàng thành công";
        $checkUser = Users_Model::where('email', Auth::user()->email)->first();
        $detail = DB::table('order_detail')->select('order_detail.course_id','course.name','course.price','order_detail.quantity','course.photo')->rightJoin('course','course.id','=','order_detail.course_id')->rightJoin('order','order.id','=','order_detail.order_id')->where('order.id',$order->id)->get();
       
        if ($checkUser) {
            // $token_random = Str::random();
            $user = Users_Model::find($checkUser->id);
            //Send mail
            $email = $user->email;
            // $link_resetpass = url('/?email=' . $email . '&token=' . $token_random);

            $data = array("fullname" => $user->fullname, 'email' => $email,"order_detail"=>$detail,"total_price"=>$order->total_price);
            // dd($data);
            // die;
            Mail::send("Sites::Mail.order", ['data' => $data], function ($message) use ($titlename, $data) {

                $message->to($data['email']);
                $message->subject($titlename);
                $message->from($data['email'], $titlename);
            });
            
        }else{
            return "gui mail that bai";
        }
        
        //Billing
        // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
        // $vnp_Bill_Email = $_POST['txt_billing_email'];
        // $fullName = trim($_POST['txt_billing_fullname']);
        // if (isset($fullName) && trim($fullName) != '') {
        //     $name = explode(' ', $fullName);
        //     $vnp_Bill_FirstName = array_shift($name);
        //     $vnp_Bill_LastName = array_pop($name);
        // }
        // $vnp_Bill_Address=$_POST['txt_inv_addr1'];
        // $vnp_Bill_City=$_POST['txt_bill_city'];
        // $vnp_Bill_Country=$_POST['txt_bill_country'];
        // $vnp_Bill_State=$_POST['txt_bill_state'];
        // Invoice
        // $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
        // $vnp_Inv_Email=$_POST['txt_inv_email'];
        // $vnp_Inv_Customer=$_POST['txt_inv_customer'];
        // $vnp_Inv_Address=$_POST['txt_inv_addr1'];
        // $vnp_Inv_Company=$_POST['txt_inv_company'];
        // $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
        // $vnp_Inv_Type=$_POST['cbo_inv_type'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate"=>$vnp_ExpireDate,
            // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
            // "vnp_Bill_Email"=>$vnp_Bill_Email,
            // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
            // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
            // "vnp_Bill_Address"=>$vnp_Bill_Address,
            // "vnp_Bill_City"=>$vnp_Bill_City,
            // "vnp_Bill_Country"=>$vnp_Bill_Country,
            // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
            // "vnp_Inv_Email"=>$vnp_Inv_Email,
            // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
            // "vnp_Inv_Address"=>$vnp_Inv_Address,
            // "vnp_Inv_Company"=>$vnp_Inv_Company,
            // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
            // "vnp_Inv_Type"=>$vnp_Inv_Type
        );
        
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }
        
        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                // echo json_encode($returnData);
                return redirect($vnp_Url);
            }
            // vui lòng tham khảo thêm tại code demo
    }

    public function return(Request $request)
    {
        $url = session('url_prev', '/');

        if ($request->vnp_ResponseCode == "00") {
            // $this->apSer->thanhtoanonline(session('cost_id'));  
            foreach(Cart::content() as $item){
                $user_course = array();
                $user_course['course_id'] = $item->id;
                $user_course['user_id'] = Auth::user()->id;
                $user_course['status'] = 1;
                $user_course['created_at'] = Carbon::now();
                $user_course['updated_at'] = Carbon::now();
                $list = DB::table('user_course')->insert($user_course);
            }
            if(session()->has('order_id')){
                $payment = PaymentVNP_Model::find(session()->get('order_id'));
                $payment->status = 1;
                $payment->save();
                // echo session()->get('order_id');
                session()->forget('order_id');
            }

            Cart::destroy();
            return redirect($url)->with('success', 'Đã thanh toán phí dịch vụ');
        }
        session()->forget('url_prev');
        return redirect($url)->with('errors', 'Lỗi trong quá trình thanh toán phí dịch vụ');
    }
}
