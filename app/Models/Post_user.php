<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_user extends Model
{
    use HasFactory;
    protected $fillable=['post_id','user_id'];
    protected $table = 'post_users';
}
