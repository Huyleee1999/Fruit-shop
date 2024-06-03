<?php

namespace App\Http\Controllers;

use App\Models\Billings;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\City;
use App\Models\PaymentMethods;

class BillingsController extends Controller
{
    public function showProceed() {
        
        $data = CartItem::join('fruits', 'cart_item.fruit_id', '=', 'fruits.id')
                        ->select('cart_item.*', 'fruits.name', 'fruits.price', 'fruits.image')
                        ->get();

        $cities = City::all();

        $payment_method = PaymentMethods::all();

        return view('billings.proceed', compact('data', 'cities', 'payment_method'));
    }

    public function addProceed(Request $request) {
        $request->validate([
            'fullname' => 'required | string',
            'address' => 'required | string',
            'city' => 'required | string',
            'phone' => 'required | numeric | min:6',
            'email' => 'required | string',
            'payment_method' => 'required'
        ]);
        
        Billings::create([
            'full_name' => $request->fullname,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'note' => $request->note ?? null,
            'city_id' => $request->input('city'),
            'cart_id' => $request->input('btn-proceed'),
            'payment_method_id' => $request->input('payment_method')
        ]);

        return redirect()->back()->with('success', 'Order added successfully!');
    }
}
