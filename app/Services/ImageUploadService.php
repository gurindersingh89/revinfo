<?php

namespace App\Services;

use File;

class ImageUploadService
{
    public function uploadImage($rawImage)
    {
        $destinationPath = 'images/';
        $image = date('YmdHis') . "." . $rawImage->getClientOriginalExtension();
        $rawImage->move($destinationPath, $image);

        return $image;
    }

    public function unlinkImage($imagePath)
    {
        if (File::exists('images/' . $imagePath) && $imagePath != 'test-image.jpg') {
            unlink('images/' . $imagePath);
        }
    }
}

?>