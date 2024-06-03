<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Fruits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class ShopController extends Controller
{
    public function index()
    {
        $data = Fruits::all();

        $totalQuantity = CartItem::sum('quantity');

        // $this->getQuantityCart($id);
        return view('shop.index', compact('data', 'totalQuantity'));
    }
    

}

