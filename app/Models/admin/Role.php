<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\Admin;
use App\Models\admin\Permission;

class Role extends Model
{
    use HasFactory;

    protected $fillable=['name'];
    protected $table = 'roles';

    public function admins(){

        return $this->belongsToMany(Admin::class ,'admin_roles');





    }
    public function permissions(){

        return $this->belongsToMany(Permission::class ,'role_permissions');





    }
}
