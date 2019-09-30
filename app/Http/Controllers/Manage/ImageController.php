<?php

namespace App\Http\Controllers\Manage;

use App\Traits\FileUpload;
use App\Http\Controllers\Controller;
use Spatie\MediaLibrary\Models\Media;
use App\Http\Requests\Image\DeleteMediaRequest;
use App\Http\Requests\Image\UploadImageRequest;

class ImageController extends Controller
{
    use FileUpload;

    public function __construct()
    {
        $this->middleware(['verified']);
    }

    /**
     * Upload ckeditor images.
     *
     * @param UploadImageRequest $request
     * @return string
     */
    public function uploadCkeditorImage(UploadImageRequest $request)
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

    /**
     * Delete media files.
     *
     * @param DeleteMediaRequest $request
     * @param Media $media
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function deleteMedia(DeleteMediaRequest $request, Media $media)
    {
        $media->delete();

        return response([
            'message' => trans('images.deleted'),
        ]);
    }
}
