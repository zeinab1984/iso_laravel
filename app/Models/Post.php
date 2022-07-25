<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
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
        return $this->belongsToMany(Comment::class);
    }

    public function file()
    {
        return $this->morphOne(File::class,'fileable');

    }


}
