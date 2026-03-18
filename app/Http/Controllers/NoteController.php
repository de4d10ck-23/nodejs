<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function dashboard()
    {
        return view(
            'notes.dashboard',
            ['notes' => Note::latest()->get()]
        );
    }

    public function addNote(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        Note::create([
            'title' => $data['title'],
            'content' => $data['content']
        ]);

        return redirect()->route('dashboard');
    }

    public function editNote(Note $note)
    {
        return view('notes.edit', ['note' => $note]);
    }

    public function updateNote(Request $request, Note $note)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $note->update([
            'title' => $data['title'],
            'content' => $data['content']
        ]);

        return redirect()->route('dashboard');
    }

    public function deleteNote(Note $note)
    {
        $note->delete();
        return redirect()->route('dashboard');
    }
}
