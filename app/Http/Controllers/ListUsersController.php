<?php

namespace App\Http\Controllers;

use App\Models\ListUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ListUsersController extends Controller
{
    public function index() {
        $data = ListUsers::all();
        return view('list-users.index', compact('data'));
    }

    public function create() {
        return view('list-users.create');
    }

    public function edit($id) {
        $data = ListUsers::find($id);
        return view('list-users.edit', compact('data'));
    }

    public function delete(Request $request) {
        ListUsers::where('id', $request->id)->delete();

        Session::flash('success', 'Delete Successfully!');

        return redirect()->back();
    }

   

    
}
