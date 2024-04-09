<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() { 
        $users = User::latest()->get();
        return view("users.usersIndex", compact("users"));
    }

    public function create() { }

    public function store(Request $request) { }

    public function show($id) {
        $user = User::find($id);
        return view("users.usersShow",compact ("user"));
     }

    public function edit(User $user) { }

    public function update(Request $request, User $user) { }

    public function destroy(User $user) { }
}
