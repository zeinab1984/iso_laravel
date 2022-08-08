<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


use function PHPUnit\Framework\countOf;

class HomeController extends Controller
{
    public function show(Request $request)
    {

        Cache::remember('posts',now()->addMinutes(1),function (){
//            dd(Post::all());

        });
        $posts = Post::query()->where('status','منتشر شده')->get();
        $users = User::all();

        return view('frontpage.show',compact('posts','users'));
    }

    public function single(Post $post)
    {
        $file_path = "";
        foreach ($post->files as $pic){
            if(isset($pic->file_path)){
                $file_path = $pic->file_path;
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

    public function search(Request $request)
    {
        $search = $request->search;
        $result = Post::query()->where('status','منتشر شده')
              ->where('title','like','%'. $request->search.'%')
//                ->orWhere(function ($query){
//                  $query ->Where('short_content','like','%'.$request->search.'%')
//                        ->orWhere('content','like', '%'. $request->search.'%');
//                })
            ->get();


        return view('frontpage.search',compact('result'));
    }
}
