<?php
namespace App\Traits;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Post;

trait PictureTrait{

    public function upload($image , $imageable_id , $model){
       
        $picture = new Picture();
        $picture->imageable_type = $model;
        $picture->imageable_id = $imageable_id;
       $picture->thumbnail =  Storage::put('post-thumnail', $image);
       $picture->save();

    }
}