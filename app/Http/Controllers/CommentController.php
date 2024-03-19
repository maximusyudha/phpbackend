<?php

namespace App\Http\Controllers;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    // Get all comments
    public function index()
    {
        $comments = Comment::all();
        return response()->json($comments);
    }

    // Create a new comment
    public function store(ComentRequest $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id', 
            'comment' => 'required|string',
        ]);

        $comment = Comment::create([
            'user_id' => $request->user_id,
            'comment' => $request->comment,
        ]);

        return response()->json($comment, 201);
    }

    // Get a single comment
    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return response()->json($comment);
    }

    // Update a comment
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        $request->validate([
            'comment' => 'required|string',
        ]);

        $comment->update([
            'comment' => $request->comment,
        ]);

        return response()->json($comment);
    }

    // Delete a comment
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully']);
    }
}