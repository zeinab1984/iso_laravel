<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withPivot('role_id')->withTimestamps();
    }

    public function files()
    {
        return $this->morphMany(File::class,'fileable');
    }

    public function getroles()
    {
       return $this->roles()->withpivot('role_id');

    }

    public static function getUserImage()
    {
        if(Auth::user()->files()->first()!="" && Auth::user()->files()->first()!=null){
            $user_pic = Auth::user()->files()->first()->file_path;
        }else{
            $user_pic = asset('storage/uploads/1659078578_avatar3.png/');
        }
        return $user_pic;
    }





}
