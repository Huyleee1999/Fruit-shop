<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Fruits;

class HomeController extends Controller
{
    public function index() {
        $data = Fruits::all();

        $totalQuantity = CartItem::sum('quantity');

        return view('layout/index', compact('data', 'totalQuantity'));
    }
}
