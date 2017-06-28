<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Note;

class NoteController extends Controller
{
    public function index()
    {
        return Note::with('user')->get();
    }

    public function userNotes()
    {
        return Auth::guard('api')->user()->notes;
    }

    public function store(Request $request)
    {
        $note = new Note();
        $note->body = $request->body;
        $note->user_id = Auth::guard('api')->user()->id;

        if ($note->save()) {
            return $note;
        } else {
            return response()->json([
                'status' => 404
            ]);
        }
    }

    public function show($id)
    {
        $note = Note::where('user_id', Auth::guard('api')->user()->id)->where('id', $id)->first();
        
        if (!$note) {
            return response()->json([
                'message' => 'Note not found!',
                'status' => 404
            ]);
        }

        return $note;
    }

    public function update(Request $request, $id)
    {
        $note = Note::where('user_id', Auth::guard('api')->user()->id)->where('id', $id)->first();
        
        if (!$note) {
            return response()->json([
                'message' => 'Note not found!',
                'status' => 404
            ]);
        }

        $note->body = $request->body;

        if ($note->save()) {
            return response()->json([
                'message' => 'Note successfully saved.',
                'status' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Something went wrong.',
                'status' => 205
            ]);
        }  
    }

    public function destroy($id)
    {
        $note = Note::where('user_id', Auth::guard('api')->user()->id)->where('id', $id)->first();
        
        if (!$note) {
            return response()->json([
                'message' => 'Note not found!',
                'status' => 404
            ]);
        }

        if ($note->delete()) {
            return response()->json([
                'message' => 'Note successfully deleted.',
                'status' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Something went wrong.',
                'status' => 205
            ]);
        }  
    }
}
