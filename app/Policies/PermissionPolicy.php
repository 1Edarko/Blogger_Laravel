<?php

namespace App\Policies;

use App\Models\User;
use App\Models\admin\Admin;

use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function permissions(admin $user){

        return $this->getPermissions($user , 'permissions-CRUD');
    }

    public function assign_permissions(admin $user){

        return $this->getPermissions($user , 'Assignements-CRUD');

    }


    public function getPermissions($user ,$permit){

        foreach($user->roles as $role){
            foreach($role->permissions as $permission){
                if($permission->name == $permit){
                    return true;
                }
 
 
             
            }
 
        }
        return false;
    }
}
