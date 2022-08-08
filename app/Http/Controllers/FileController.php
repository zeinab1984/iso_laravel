<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function createForm()
    {
        $user = Auth::user();
        $file_path = 'http://iso_laravel.test/storage/uploads/user3-128x128.jpg';
        foreach ($user->files as $file){
           if(isset($file->file_path)){
               $file_path = $file->file_path;
           }
        }

        return view('profile.createForm',compact('user','file_path'));
    }

    public function update(Request $request,User $user )
    {
//        dd($request);
        $user->name = $request->name;
        $user->email = $request->user_email;
        $user->save();
        if($user->files()){
            $user->files()->delete();
            $path ='avatars';
        }else{
            $path ='avatars';
        }
        $file = UploadFile($request->image,$path);
        $user->files()->save($file);

        return redirect()->route('profile.createForm');
    }


}
