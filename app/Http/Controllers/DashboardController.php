<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class DashboardController extends Controller
{
    public function index() {
        //$users = User::join('posts', 'users.id', '=', 'posts.user_id')->select('users.name')->get();
        $posts = Post::join('users', 'posts.user_id', '=','users.id')->latest('posts.created_at')->get();
        return view("dashboard", compact("posts"));
    }
}
