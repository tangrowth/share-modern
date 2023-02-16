<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $item = Comment::create($request->all());
        return response()->json([
            'data' => $item
        ], 201);
    }
}
