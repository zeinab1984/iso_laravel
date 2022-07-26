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

    public function update(Request $request,User $user,File $file )
    {
//        dd($request->filePath);
        $user->name = $request->name;
        $user->email = $request->user_email;
        $user->save();
    }
    public function fileUpload(Request $req){
//        dd($req->file());
        $req->validate([
            'file' => 'required|mimes:jpg,jpeg,png|max:2048'
        ]);

        $fileModel = new File;
        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->fileable_type = User::class;
            $fileModel->fileable_id = $req->user;
            $fileModel->save();
            return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
        }
    }

}
