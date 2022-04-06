<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pivot;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;

class PostController extends Controller
{
    public function create(){
        $category = Category::all();
        return view('posts.create', ['categories' => $category]);
    }
    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'categories' => 'required|max:255',
            'tags' => 'required|max:255'
        ]);

        $exploded = explode(', ', $request->tags);

       DB::transaction(function() use ($request, $exploded){
        foreach($exploded as $key => $tags){
            $tag = Tag::updateOrCreate([
                
                 'name' => $tags
             ]);
         }
         $postId = Post::insertGetId([
 
             'user_id' => Auth::id(),
             'title' => $request->title,
             'content' => $request->content,
             'views' => 0
         ]);
         
         foreach($request->categories as $key => $category){
             DB::table('post_category')->insert([
                 'post_id' => $postId,
                 'category_id' => $category
             ]);
         }
         foreach($exploded as $key => $tagName){
             foreach(Tag::where('name', $tagName)->get('id') as $tagId){
                 DB::table('tag_post')->insert([
                     'post_id' => $postId,
                     'tag_id' =>$tagId->id
                 ]);
 
             }
 
         }
       });

        return redirect()->route('dashboard');
    }
    public function view($id){
        $category = Category::find($id);
        return view('posts.view', ['categories' => $category]);
    }
    public function edit($id){
        $post = Post::find($id);
        return view('posts.edit', ['posts' => $post]);
    }
    public function update(Request $request, $id){
        $editPost = Post::where('id', $id)->update(['title' => $request->editedtitle, 'content' => $request->editedcontent]);
        $dd = Post::find($id);
        foreach($dd->categories as $category){
            $categoryId = $category->id;
        }
        return redirect('/posts/' .$categoryId);
    }
    public function destroy($id){
        $deletePost = Post::find($id);
        $deletePost->delete();
        return back();
    }
}
