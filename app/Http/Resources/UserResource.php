<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        
        return [
            'id' => $this->id,
            'email' => $this->email,
            'banner' => asset('storage/'.$this->banner),
            'thumnail' =>  PictureResource::collection($this->images),
            'comment' =>   CommentResource::collection($this->comment)
        ];
    }
}
