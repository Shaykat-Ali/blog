<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Picture;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','title' , 'banner'];
    public function images()
    {
        return $this->morphMany(Picture::class, 'imageable');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
