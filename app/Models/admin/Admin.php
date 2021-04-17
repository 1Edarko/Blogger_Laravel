<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\admin\Role;

class Admin extends Authenticatable
{
    use HasFactory , Notifiable;


    protected $fillable=['name','email','password','phone','user_image','about_me' , 'job'];
    protected $table = 'admins';

    public function roles(){

        return $this->belongsToMany(Role::class ,'admin_roles');





    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    
}
