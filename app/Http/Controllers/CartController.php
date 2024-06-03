<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use view;
use App\Models\Fruits;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;

class CartController extends Controller
{
    public function cart() {

        $data = CartItem::join('fruits', 'cart_item.fruit_id', '=', 'fruits.id')
                        ->select('cart_item.*', 'fruits.name', 'fruits.price', 'fruits.image')
                        ->get();
        

        return view('shop.cart', compact('data'));
    }

    public function addCart($id) {
        $data = Fruits::find($id);
        return view('cart.show', compact('data'));
    }

    public function addToCart(Request $request, $productId)
    {
        $fruit = Fruits::findOrFail($productId);
        
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id(),
        ]);

        $cartItem = CartItem::where('cart_id', $cart->id)->where('fruit_id', $fruit->id)->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
        } else {
            $cartItem = CartItem::create([
                'cart_id' => $cart->id, 
                'fruit_id' => $fruit->id,
                'quantity' => 1,
            ]);
        }

        $cartItem->save();

        return response()->json(['success' => true, 'message' => 'Product added to cart successfully.']);
    }

    public function deleteCart($id) {
        $data = CartItem::findOrFail($id);

        if ($data) {
            $data->delete();
            return response()->json(['success' => true, 'message' => 'Fruit deleted successfully.']);
        }
       
        return response()->json(['fail' => false, 'message' => 'Fruit deleted failed.']);
    }

    
}
