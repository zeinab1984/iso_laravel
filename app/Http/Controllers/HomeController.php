<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $posts = Post::all();
        $users = User::all();
        $file_path = "";

        return view('frontpage.show',compact('posts','users'));
    }

    public function single(Post $post)
    {

        return view('frontpage.single',compact('post'));
    }
}
