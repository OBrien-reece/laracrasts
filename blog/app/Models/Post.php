<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    /*Query Scopes*/
    public function scopeFilter($query, array $filters) {

        if($filters['search'] ?? false)  {
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }
    }

    protected $with = ['category', 'author'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $guarded = ['id'];
//    protected $fillable = ['title', 'body', 'excerpt', 'published_at'];
}
