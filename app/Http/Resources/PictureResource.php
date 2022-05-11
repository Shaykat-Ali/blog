<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PictureResource extends JsonResource
{

    public function toArray($request)
    {
       
        return [
            'thumbnail' => asset('storage/'.$this->thumbnail),
        ];
    }
}
