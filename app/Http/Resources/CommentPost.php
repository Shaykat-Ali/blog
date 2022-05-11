<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentPost extends JsonResource
{
    public function toArray($request)
    {
        
        return [
            'id' => $this->id,
            'title' => $this->$title,
            'banner' => asset('storage/'.$this->banner),
            'thumnail' =>  PictureResource::collection($this->images),
            'comment' =>   CommentResource::collection($this->comment)
        ];
    }
}
