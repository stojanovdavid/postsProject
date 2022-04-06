<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'views'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class, 'post_category');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function ownedBy(User $user){
        return $this->user_id === $user->id;
    }
    public function tags(){
        return $this->belongsToMany(Tag::class, 'tag_post');
    }
}
