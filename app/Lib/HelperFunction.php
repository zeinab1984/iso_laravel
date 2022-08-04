<?php

use App\Models\File;
use App\Models\User;
function UploadFile($request,$object)
{
//    dd($request->file('image'));
    if ($request->file()) {
        $fileModel = new File;
        $req = $request->file('image');
        $fileName = time().'_'.$req->getClientOriginalName();
        $filePath = $req->storeAs('uploads', $fileName, 'public');
        $fileModel->name = $fileName ;
        $fileModel->file_path = '/storage/' . $filePath;
        $object->files()->save($fileModel);

    }

}
