<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class MyProfileController extends Controller
{
    public function show($id) {
      $user = User::find($id);
      Log::error('Showing the user profile for user: '.$id);
      $posts = Post::where('user_id', $user->id)->latest()->get();
      return view("myProfile",compact("user","posts"));
     }
}