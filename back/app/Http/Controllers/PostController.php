<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Post::with(['user', 'comments', 'favorites'])->get();
        return response()->json(['data' => $items],200);
    }

    public function store(Request $request)
    {
        $item = Post::create($request->all());
        return response()->json([
            'data' => $item
        ], 201);
    }

    public function show(Post $post)
    {
        $item = Post::with(['user', 'comments', 'favorites'])->find($post)->first();
        $comments = Comment::where('post_id',$item->id)->get();
        if ($post) {
            return response()->json([
                'data' => $item,
                'comments' => $comments,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }

    public function destroy(Post $post)
    {
        $item = Post::where('id', $post->id)->delete();
        if ($item) {
            return response()->json([
                'message' => 'Deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
}
