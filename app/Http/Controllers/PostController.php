<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\File;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
                'tags'=>Tag::all(),
            ];

        return view('posts.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,File $file)
    {
//        dd($request->file());
        $post =new Post();
        $post->title = $request->title;
        $post->short_content = $request->short_content;
        $post->content = $request->post_content;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        $post->status = $request->status;
        $post->save();
        $post->tags()->attach($request->tag);

        if($request->hasFile('image')){

            $pic = $request->file('image');
            $path = 'posts';
            $file = UploadFile($pic,$path);
            $post->files()->save($file);
        }

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
        $post_pic = "";
        foreach ($post->files as $file){
            if(filled($file->file_path)) {
                $post_pic = storage::url($file->file_path);
            }
        }

        $data = [
            'post'=>$post,
            'categories'=>Category::all(),
            'tags'=>Tag::all(),
            'tag_ids'=> $post->tags()->pluck('id')->toArray(),
            'post_pic'=>$post_pic,
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

        //delete old pics from directory and relationship
        if(filled($post->files)){
            foreach ($post->files as $file){
                storage::delete($file->file_path.'/'.$file->name);
                $post->files()->delete();
            }
        }
        //save new pic
        if($request->hasFile('image')){

            $pic = $request->file('image');
            $path = 'posts';
            $file = UploadFile($pic,$path);
            $post->files()->save($file);
        }



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
