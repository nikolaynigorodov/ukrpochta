<?php


namespace App\Services;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FileUploadServices
{
    const PATH_IMAGES = '/files/';

    public function fileSave(UploadedFile $uploadedFile): string
    {
        $imageName = time().'.'.$uploadedFile->extension();
        $filePath = public_path(self::PATH_IMAGES);
        if(!Storage::exists($filePath)){
            Storage::makeDirectory($filePath);
        }
        $uploadedFile->move($filePath, $imageName);

        return self::PATH_IMAGES . $imageName;
    }
}
