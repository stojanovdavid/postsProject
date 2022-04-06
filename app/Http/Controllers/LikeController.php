<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store($id){
        $user = auth()->user();
        $post = Post::where('id', $id)->first();

        Like::updateOrCreate([
            'user_id' => $user->id,
            'post_id' => $post->id
        ]);

        return back();
    }
    public function destroy($id){
        $userId = auth()->user()->id;
        $likes = Like::where('post_id', $id)->where('user_id', $userId)->first();
        $likes->delete();
        return back();
    }
}
