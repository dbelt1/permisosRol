<?php

namespace App\Services;

use App\Models\Photo;

class PhotoService
{   
    protected $photo;
    public function __construct()
    {
        $this->photo = new Photo;
    }
    public function savePhoto($images)
    {
        if($images)
        {
            $link = 'app/public/posts/image/';
            return $this->photo->saveImage($images,$link);
        }
    }
}