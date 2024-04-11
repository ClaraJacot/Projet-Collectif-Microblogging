<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() { 
        $posts = Post::latest()->get();
        return view("posts.postIndex", compact("posts"));
    }

    public function create() { 
        return view("posts.postsCreate");
    }

    public function store(Request $request) { 
        $this->validate($request, [
            'titre' => 'bail|required|string|max:255',
            'texte' => 'bail|required',
            'user_id'=> 'bail|required',
        ]);
        $post = Post::create([
            "titre" => $request->titre,
            "texte" => $request->texte,
            "user_id"=> $request->user_id,
        ]);
        return redirect()->route("postIndex")->with("success","");
    }

    public function show($id) {
        $post = Post::find($id);
        return view("posts.postsShow",compact ("post"));
     }

    public function edit(Post $post) { }

    public function update(Request $request, Post $post) { }

    public function destroy(Post $post) { }
}
