<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class DashboardController extends Controller
{
    public function index() {
        $posts = Post::join('users', 'posts.user_id', '=','users.id')->select('posts.*', 'users.name')->latest()->get();
        return view("dashboard", compact("posts"));
    }
}
