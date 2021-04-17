<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\Role;

class Permission extends Model
{
    use HasFactory;

    protected $fillable=['name'];
    protected $table = 'permissions';

    public function roles(){

        return $this->belongsToMany(Role::class ,'role_permissions');





    }
}
