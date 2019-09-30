<?php

namespace App\Http\Controllers\Manage;

use App\Traits\FileUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Upload\UploadImageRequest;

class UploadController extends Controller
{
    use FileUpload;

    public function __construct()
    {
        $this->middleware(['verified']);
    }

    /**
     * Upload images.
     *
     * @param UploadImageRequest $request
     * @return string
     */
    public function ckeditorImage(UploadImageRequest $request)
    {
        $this->setDisk('public');
        $filePath = $this->handleUploadedFile($request->file('upload'));

        return response(
            "<script>window.parent.CKEDITOR.tools.callFunction(
                {$request->input('CKEditorFuncNum')}, 
                '/storage/{$filePath}', 
                'Image successfully uploaded'
            )</script>",
            200,
            [
                'Content-type: text/html; charset=utf-8',
            ]
        );
    }
}
