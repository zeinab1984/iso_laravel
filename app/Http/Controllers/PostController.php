<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();

        $roles = $user->roles()->pluck('title')->toArray();
        if(in_array('admin',$roles))
        {
            $posts = Post::all();
        } else{
           $posts = $user->posts;
        }
       return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $data =[
            'categories' => Category::all(),
                'tags'=>Tag::all()
            ];

        return view('posts.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $post =new Post();
        $post->title = $request->title;
        $post->short_content = $request->short_content;
        $post->content = $request->post_content;
        $post->category_id = $request->category_id;
        $post->user_id = 1;
        $post->status = $request->status;
        $post->save();
        $post->tags()->attach($request->tag);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data = [
            'post'=>$post,
            'categories'=>Category::all(),
            'tags'=>Tag::all(),
            'tag_ids'=> $post->tags()->pluck('id')->toArray(),
        ];
//        dd($data);
        return view('posts.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
//        dd($request);
        $post->title = $request->title;
        $post->short_content = $request->short_content;
        $post->content = $request->post_content;
        $post->category_id = $request->category_id;
        $post->status = $request->status;
        $post->save();
        $post->tags()->sync($request->tag);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
