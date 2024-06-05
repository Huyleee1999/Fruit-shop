<?php

namespace App\Http\Controllers;

use App\Models\Fruits;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {
        $query = $request->input('query');
        
        // if(strlen($query) < 2) {
        //     return response()->json([]);
        // }
        
        $fruits = Fruits::where('name', 'like', "%{$query}%")->get();
        
        return response()->json($fruits);
    }
}
