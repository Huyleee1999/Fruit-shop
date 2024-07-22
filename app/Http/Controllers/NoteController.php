<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\NoteTypeCategory;
use Illuminate\Http\Request;
use php_user_filter;

class NoteController extends Controller
{
    public function index() {
        // $data = Note::pluck('type');
        $data = NoteTypeCategory::pluck('title');

        $all_notes = Note::all();

        $note_business = Note::where('type', 'business')->get();

        $note_social = Note::where('type', 'social')->get();

        return view('note.index', compact('data', 'all_notes', 'note_business', 'note_social'));
    }

    public function addNote(Request $request) {
        $request->validate([
            'title' => 'required ',
            'description' => 'required',
            'note_date' => 'required',
            'type' => 'required',
        ]);
        $note = Note::create([
            'title' => $request->title,
            'description' => $request->description,
            'note_date' => $request->note_date,
            'type' => $request->type,
        ]);

        return response()->json($note);
    }

}
