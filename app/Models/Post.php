<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;



    private mixed $id;


    public function category()
     {
         return $this->belongsTo(Category::class);
     }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function files()
    {
        return $this->morphMany(File::class,'fileable');

    }


    public static function getLatestPost()
    {
        return static::query()->where('status','منتشر شده')->with(['files','category','user'])->latest()->take(3)->get();

    }


//    public static function getPostImage()
//    {
//
//        return static::query()->with('files')->first()->get();
//
//    }


}
