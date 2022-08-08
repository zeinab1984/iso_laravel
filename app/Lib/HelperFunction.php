<?php

use App\Models\File;
use App\Models\User;
function UploadFile($pic,$path)
{

        $fileName = time().'_'.$pic->getClientOriginalName();
        $pic->storeAs('public/'.$path,$fileName);

        return new File([
            'name'=> $fileName,
            'file_path'=> $path.'/'.$fileName,
        ]);
}
