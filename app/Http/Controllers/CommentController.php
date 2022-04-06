<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($id){
        $post = Post::find($id);
        Post::find($id)->increment('views');



        return view('posts.comments', ['posts'=> $post]);
    }
    public function store(Request $request, $id){
        $postid = Post::find($id);
        $request->user()->comments()->create([
            'content' => $request->comment,
            'post_id' => $postid->id
        ]);
        return back();
    }
    public function edit($id){
        $comment = Comment::find($id);
        return view('comments.edit', ['comments' => $comment]);
    }
    public function update(Request $request, $id){
        Comment::where('id', $id)->update(['content' => $request->editedcomment]);
        $dd = Comment::find($id);
        $postId = $dd->post->id;
        return redirect('/comments/'.$postId);
    }
    public function destroy($id){

        $deleteComment = Comment::find($id);
        $deleteComment->delete();
        return back();
    }
}
