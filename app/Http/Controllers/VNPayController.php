<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Billings;

class VNPayController extends Controller
{
     public function createPayment(Request $request)
    {
        $request->validate([
            'fullname' => 'required | string',
            'address' => 'required | string',
            'city' => 'required | string',
            'phone' => 'required | numeric | min:6',
            'email' => 'required | string',
            'payment_method' => 'required',
            'total'=> 'required'
        ]);

        Billings::create([
            'full_name' => $request->fullname,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'note' => $request->note ?? null,
            'city_id' => $request->input('city'),
            'cart_id' => $request->input('btn-proceed'),
            'payment_method_id' => $request->input('payment_method'),
            'status' => 'unpaid'
        ]);

        $orderInfo = "Thanh toan don hang";
        $amount = $request->total; 
        $orderId = date("YmdHis"); 
        
        // Tạo URL thanh toán của VNPay
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('payment.callback');
        $vnp_TmnCode = "Y49NNE6T"; // Mã website của bạn tại VNPay
        $vnp_HashSecret = "1V4J7MZ0GWZLQHYIN96JKIM9D4KI74JJ"; // Chuỗi bí mật của bạn tại VNPay
        
        $vnp_TxnRef = $orderId;
        $vnp_OrderInfo = $orderInfo;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $amount * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();
        
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
        );

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
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }

    public function callback(Request $request)
    {
        $vnp_SecureHash = $request->get('vnp_SecureHash');
        $inputData = $request->except('vnp_SecureHash', 'vnp_SecureHashType');
        ksort($inputData);
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }
        // $hashData = trim($hashData, '&');
        $secureHash = hash_hmac('sha512', $hashdata, '1V4J7MZ0GWZLQHYIN96JKIM9D4KI74JJ');
        if ($secureHash == $vnp_SecureHash) {
            if ($request->get('vnp_ResponseCode') == '00') {
                // Thanh toán thành công
                return redirect()->route('payment.success');
            } else {
                // Thanh toán không thành công
                return redirect()->route('payment.failed');
            }
        } else {
            // Chuỗi ký tự không hợp lệ
            return redirect()->route('payment.failed');
        }
    }

    public function paymentSuccess() {
        dd(123);
    }
}

