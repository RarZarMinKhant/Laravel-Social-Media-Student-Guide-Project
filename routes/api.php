<?php

use App\Models\Reaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/toggle-reaction', function(Request $request) {
    $reaction = Reaction::where('user_id',$request->userId)->where('blog_id',$request->postId)->first();

    if ($reaction) {
        $reaction->delete();
        return response()->json(['message' => 'unlike'], 200);
    }

    Reaction::create([
        'user_id'=> $request->userId,
        'blog_id' => $request->postId
    ]);
    return response()->json(['message' => 'like'], 200);
});

