<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag_post extends Model
{
    use HasFactory;
    protected $fillable=['post_id','Tag_id'];
    protected $table = 'Tag_posts';
}
