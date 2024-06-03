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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/fruits'), $filename);
        }

        Fruits::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $filename
        ]);

        return redirect()->back()->with('success', 'Fruit added successfully!');
    }


    public function delete($id) {
        $data = Fruits::find($id)->first();

        if($data) {
            $data->delete();
            return response()->json(['status' => true]);
        }

        return response()->json(['status' => false]);
    }
}
