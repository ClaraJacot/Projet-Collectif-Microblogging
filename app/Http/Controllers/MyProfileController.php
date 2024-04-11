<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class MyProfileController extends Controller
{
    public function show(Request $request) {
        
        return view("myProfile",['user' => $request->user()]);
     }

     public function index(Request $request) {
        $user = $request->user();
        $posts = Post::where('user_id', $user->id)->latest()->get();
        return view("myProfile",compact("posts"));
     }
}