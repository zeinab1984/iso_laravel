<?php

use App\Models\File;
use App\Models\User;
function UploadFile($pic,$path): File
{

        $fileName = time().'_'.$pic->getClientOriginalName();
        $pic->move('public/'.$path,$fileName);

        return new File([
            'name'=> $fileName,
            'file_path'=> $path.'/'.$fileName,
        ]);
}
