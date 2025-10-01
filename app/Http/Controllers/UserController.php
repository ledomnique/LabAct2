<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class UserController extends Controller
{
    //
    public function index() {
        $user = Auth::user();
        // get posts that belong to the authenticated user, oldest first
        $posts = Post::where('user_id', $user->id)->oldest()->paginate(10);
        
        return view('user.my-posts', compact('posts'));
    }

    public function dashboard() {
        return view('user.dashboard');
    }
}
