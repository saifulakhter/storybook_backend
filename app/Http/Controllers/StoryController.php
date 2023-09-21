<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;

class StoryController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'string|max:255',
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'content' => 'required|string|max:1000',
        ]);

    $story = Story::create($data);

    return response()->json(['message' => 'Story created successfully', 'data' => $story], 201);
    }

    public function index()
    {
        $stories = Story::all();
        return response()->json(['data' => $stories]);
    }

    public function getUserStories(Request $request, $userId)
    {
        $stories = Story::where('user_id', $userId)->get();
        return response()->json(['data' => $stories], 200);
    }
   
}
