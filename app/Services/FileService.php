<?php

namespace App\Services;

use App\Models\File;
use Illuminate\Http\UploadedFile;

class FileService
{
    public function createContactFile(UploadedFile $uploadedFile)
    {
        $file = File::query()->create([
            'name' => $uploadedFile->getClientOriginalName(),
            'type' => $uploadedFile->getClientOriginalExtension(),
            'mimetype' => $uploadedFile->getMimeType(),
            'size' => $uploadedFile->getSize(),
            'path' => '/feedback/' . $uploadedFile->getClientOriginalName()
        ]);

        $uploadedFile->storeAs('/feedback/', $uploadedFile->getClientOriginalName(), 'local');

        return $file;
    }
}
