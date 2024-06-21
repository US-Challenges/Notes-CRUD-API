<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Requests\NoteRequest;
use Illuminate\Http\JsonResponse;

class NoteController extends Controller
{
    public function index(): JsonResponse
    {
        $notes = Note::all();

        return response()->json([
            'success' => true,
            'data' => $notes,
        ], 200);
    }

    public function store(NoteRequest $request): JsonResponse
    {
        $note = new Note();
        $note->title = $request->title;
        $note->content = $request->content;
        $note->save();

        return response()->json([
            'success'=> true,
            'data' => $note
        ], 201);
    }

    public function show($id): JsonResponse
    {
        $note = Note::find($id);

        return response()->json([
            'success' => true,
            'data' => $note
        ], 200);
    }

    public function update(NoteRequest $request, $id): JsonResponse
    {
        $note = Note::find($id);
        $note->title = $request->title;
        $note->description = $request->description;
        $note->save();
        
        return response()->json([
            'success' => true,
            'data' => $note
        ], 200);
    }

    public function destroy($id): JsonResponse
    {
        $note = Note::find($id);
        $note->delete();

        return response()->json([
            'success' => true,
        ], 200);
    }
}
