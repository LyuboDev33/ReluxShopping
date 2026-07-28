<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class ImageService
{
    /**
     * Upload a single image.
     *
     * @param UploadedFile $file
     * @param string $destination
     * @return string
     */
    public static function uploadSingleImage(UploadedFile $file, string $destination): string {
        
        $imageName = str_replace(' ','', time() . '_' . $file->getClientOriginalName());
        $file->move(public_path($destination), $imageName);

        return $imageName;
    }

    /**
     * Upload multiple gallery images.
     *
     * @param UploadedFile[] $files
     * @param string $destination
     * @return array
     */
    public static function uploadGalleryImages(array $files, string $destination): array {
        $galleryNames = [];

        foreach ($files as $file) {

            /** Remove all spaces from the image name */
            $imageName = str_replace(' ', '', time() . '_' . $file->getClientOriginalName());
            $file->move(public_path($destination), $imageName);
            $galleryNames[] = $imageName;
        }

        return $galleryNames;
    }
}
