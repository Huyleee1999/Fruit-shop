<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index() {
        return view('categories.index');
    }

    public function show() {
        return view('categories.show');
    }

    public function addCategory(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        // $description = $request->input('description');
        // $allowed_tags = '<a><em><ul><ol><li>';
        // $descriptions = strip_tags($allowed_tags, $description);

        $cate = Categories::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Category added successfully!');
    }
}
