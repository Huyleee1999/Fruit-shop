<?php

namespace App\Http\Controllers;

use App\Models\Fruits;
use Illuminate\Http\Request;
use App\Models\Cart;

class FruitController extends Controller
{

    public function index() {
        $data = Fruits::all();
        return view('fruit.index', compact('data'));
    }


    public function showAddFruit() {
        return view('fruit.show');
    }

    public function addFruit(Request $request) {
        $request->validate([
            'name' => 'required | string',
            'description' => 'required',
            'price' => 'required | numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'origin' => 'required',
            'weight' => 'required',
            'quality' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/fruits'), $filename);
        }

        $description = $request->input('description');
        $allowed_tags = '<a><em><ul><ol><li>';
        $descriptions = strip_tags($allowed_tags, $description);

        Fruits::create([
            'name' => $request->name,
            'description' => $descriptions,
            'price' => $request->price,
            'image' => $filename,
            'origin' => $request->origin,
            'weight' => $request->weight,
            'quality' => $request->quality,
        ]);

        return redirect()->back()->with('success', 'Fruit added successfully!');
    }


    public function delete($id) {
        $data = Fruits::find($id);

        
        if($data) {
            $data->cartItems()->delete();
            $data->delete();
            return response()->json(['status' => true]);
        }

        return response()->json(['status' => false]);
    }
}
