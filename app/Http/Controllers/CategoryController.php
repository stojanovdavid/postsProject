<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){
        return view('categories.create');
    }
    public function store(Request $request){
        Category::updateOrCreate([
            'name' => $request->title
        ]);

        return redirect()->route('dashboard');
    }

    public function destroy($id){
        Category::where('id', $id)->delete();
        return back();
    }
}
