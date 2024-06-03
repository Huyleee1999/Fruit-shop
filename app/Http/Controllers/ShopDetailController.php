<?php

namespace App\Http\Controllers;

use App\Models\Fruits;
use Illuminate\Http\Request;

class ShopDetailController extends Controller
{
    public function index($id) {
        $data = Fruits::find($id);

        return view('shop-detail.index', compact($data));
    }
}
