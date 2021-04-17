<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;
use App\models\Comment;


class Post extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','body','subtitle','image','status','ft_image','view_count'];
    protected $table = 'posts';


    public function categories(){

        return  $this->belongsToMany(Category::class ,'category_posts');
    }

    public function tags(){

        return $this->belongsToMany(Tag::class ,'Tag_posts');
    }
    public function comments()
{
    return $this->hasMany(Comment::class);
}
public function like_users()
{
    return $this->hasMany(User::class , 'post_users');
}

   
}
