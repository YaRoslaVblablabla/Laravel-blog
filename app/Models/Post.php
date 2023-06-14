<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use App\Models\Comments;

class Post extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function comments(){
        return $this->belongsToMany(Comments::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function users(){
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }

}
