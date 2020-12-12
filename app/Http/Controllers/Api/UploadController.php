<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    // อัพโหลดไฟล์
    public function upload(Request $request){
        
        $fileName = time().'_'.$request->file->getClientOriginalName();  
   
        $request->file->move(public_path('uploads'), $fileName);
        $filePath = 'uploads/'.$fileName;
        return response()->json(['data' => $filePath]);
    }

    // ดึงไฟล์
    public function getFile($path){

        return response()->download(public_path('uploads/'.$path));
    }
}
