<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileService
{
    public function uploadFile(UploadedFile $file, $model)
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('public/uploads/' . strtolower(class_basename($model)), $filename);

        $publicPath = str_replace('public/', '', $path);
        
        return $model->files()->create([
            'filename' => $filename,
            'file_path' => $publicPath,
            'mime_type' => $file->getClientMimeType(),
            'size' => $file->getSize(),
        ]);
    }

    public function getFileUrl(File $file)
    {
        return Storage::url($file->file_path);
    }
}
