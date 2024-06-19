<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fruits;
use App\Models\CartItem;

class ContactController extends Controller
{
    public function index() {
        $data = Fruits::all();

        $totalQuantity = CartItem::sum('quantity');

        return view('contact.index', compact('data', 'totalQuantity'));
    }
}
