<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(2);
        return view('home.index' , compact('posts'));
    }

    public function show(Post $post)
    {
        return view('home.post' , compact('post'));
    }
}
