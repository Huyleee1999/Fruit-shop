<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\CartItem;
use App\Models\Fruits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    public function index()
    {

        $data = Fruits::all();

        $totalQuantity = CartItem::sum('quantity');

        // $this->getQuantityCart($id);
        return view('shop.index', compact('data', 'totalQuantity'));
    }
    

    public function detail($id) {
        $data = Fruits::find($id);
        $relatedProducts = Fruits::inRandomOrder()->limit(6)->get();
        // dd($relatedProducts);
        $totalQuantity = CartItem::sum('quantity');

        return view('shop.detail', compact('data', 'totalQuantity', 'relatedProducts'));
    }
}

