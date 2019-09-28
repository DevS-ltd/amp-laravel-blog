<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Traits\FileUpload;
use App\Http\Requests\Upload\UploadImageRequest;

class UploadController extends Controller
{
    use FileUpload;

    public function __construct()
    {
        $this->middleware(['auth']);
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

        // Render HTML output
        @header('Content-type: text/html; charset=utf-8');

        return "<script>window.parent.CKEDITOR.tools.callFunction(
            {$request->input('CKEditorFuncNum')}, 
            '/storage/{$filePath}', 
            'Image successfully uploaded'
        )</script>";
    }
}
