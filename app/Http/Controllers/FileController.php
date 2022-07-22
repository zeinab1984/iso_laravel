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
//        dd($user);

        return view('profile.createForm',compact('user'));
    }

    public function update(Request $request,User $user,File $file )
    {
//        dd($request->filePath);
        $user->name = $request->name;
        $user->email = $request->user_email;
        $user->save();
    }
    public function fileUpload(Request $req){
        $req->validate([
            'file' => 'required|mimes:jpg,jpeg,png|max:2048'
        ]);

        $fileModel = new File;
        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();
            return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
        }
    }

}
