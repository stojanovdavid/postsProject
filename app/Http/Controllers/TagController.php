<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index($name){
        $tag = Tag::where('name', $name)->first();
        return view('tags.index', ['tags' => $tag]);
    }
}
