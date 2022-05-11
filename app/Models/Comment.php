<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Posts;
class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['post_id','comment' , 'reply','like'];

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
