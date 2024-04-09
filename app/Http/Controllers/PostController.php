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

    public function create() { }

    public function store(Request $request) { }

    public function show($id) {
        $post = Post::find($id);
        return view("posts.postsShow",compact ("post"));
     }

    public function edit(Post $post) { }

    public function update(Request $request, Post $post) { }

    public function destroy(Post $post) { }
}
