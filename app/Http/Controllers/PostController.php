<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
            'picture'=> 'bail|required|image|max:1024',
            'texte' => 'bail|required',
            'user_id'=> 'bail|required',
        ]);
        $path_image = $request->picture->store('');

        $post = Post::create([
            "titre" => $request->titre,
            "picture"=> $path_image,
            "texte" => $request->texte,
            "user_id"=> $request->user_id,
        ]);
        return redirect()->route("myProfile",['id'=>Auth::user()->id])->with("success","");
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
            'picture'=> 'bail|required|image|max:1024',
        ];
        $path_image = $request->picture->store('');
        $this->validate($request, $rules);
        $post = Post::find($id);
        $post->update([
            "titre" => $request->titre,
            "picture"=> $path_image,
            "texte" => $request->texte]);

        return redirect()->route('dashboard');
    }

    public function destroy($id) { 
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }
}
