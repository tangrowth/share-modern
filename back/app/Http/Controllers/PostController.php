<?php

namespace App\Http\Controllers;

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
        $items = Post::all();
        return response()->json([
            'data' => $items
        ], 200);
    }

    public function store(Request $request)
    {
        $item = Post::create($request->all());
        return response()->json([
            'data' => $item
        ], 201);
    }

    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
