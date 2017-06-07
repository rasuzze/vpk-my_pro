<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FileUpload;

class FileUploadController extends Controller
{
    public function delete($id)
    {
        $file = FileUpload::FindOrFail($id);        
        $file->delete();         
       
        return redirect()->back();
    }   
}
