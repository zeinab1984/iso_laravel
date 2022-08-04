<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function show(Request $request)
    {

        $posts = Post::all();
        $users = User::all();
        $file_path = "";

        return view('frontpage.show',compact('posts','users'));
    }

    public function single(Post $post)
    {
        $file_path = "";
        foreach ($post->files as $file){
            if(isset($file->file_path)){
                $file_path = $file->file_path;
            }
        }
        return view('frontpage.single',compact('post','file_path'));
    }

    public function CommentAdd(Request $request)
    {
//        dd($request);
        $comment = new Comment;
        if(Auth::check()===true){
            $comment->user_id = Auth::user()->id;
            $comment->post_id = $request->post_id;
            $comment->content = $request->comment_content;
            $comment->is_confirm = 0;
            $comment->save();
        }else{
            $comment->author_name = $request->first_name.' '.$request->last_name;
            $comment->mobile = $request->mobile;
            $comment->email = $request->email;
            $comment->post_id = $request->post_id;
            $comment->content = $request->comment_content;
            $comment->is_confirm = 0;
            $comment->save();
        }
        return back();
    }

    public function replyAdd(Request $request)
    {
//        dd($request);
        $comment = new Comment;
        if(Auth::check()===true){
            $comment->user_id = Auth::user()->id;
            $comment->post_id = $request->post_id;
            $comment->content = $request->comment_content;
            $comment->is_confirm = 0;
            $comment->parent_id = $request->parent_id;
            $comment->save();
        }else{
            $comment->author_name = $request->first_name.' '.$request->last_name;
            $comment->mobile = $request->mobile;
            $comment->email = $request->email;
            $comment->post_id = $request->post_id;
            $comment->content = $request->comment_content;
            $comment->is_confirm = 0;
            $comment->parent_id = $request->comment_id;
            $comment->save();
        }
        return back();
    }
}
