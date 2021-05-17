<?php

namespace App\Http\Controllers\Client;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\Image\UploadImageRequest;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;

class FileController extends Controller
{
    public function uploadImage(UploadImageRequest $request)
    {
        $user=$request->user();
        $path=FileHelper::uploadFile($request->file('image'),$request->get('image_type'),$user->id);
        if(empty($path))
            return ResponseHelper::operationFail('uploading fail');
        return ResponseHelper::insert($path);
    }
}
