<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index() { 
        //User::join('posts', 'users.id', '=', 'posts.user_id')->select('users.name')->get();
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
        return redirect()->route("myProfile")->with("success","");
    }

    public function show($id) {
        $post = Post::find($id);
        return view("posts.postsShow",compact ("post"));
     }

    public function edit($id) {
        $post = Post::find($id);
        return view("posts.postsEdit",compact ("post"));
     }

    public function update(Request $request, $id) { 
        $rules=[
            'titre' => 'bail|required|string|max:255',
            'texte'=> 'bail|required',
        ];
        $this->validate($request, $rules);
        $post = Post::find($id);
        $post->update($request->all());

        return redirect()->route('dashboard');
    }

    public function destroy(Post $post) { }
}
