<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }

    protected $guarded = ['id'];
//    protected $fillable = ['title', 'body', 'excerpt', 'published_at'];
}
