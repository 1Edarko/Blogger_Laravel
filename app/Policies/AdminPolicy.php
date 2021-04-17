<?php

namespace App\Policies;

use App\Models\User;
use App\Models\admin\Admin;

use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
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

    public function users(Admin $user){

        return $this->getPermissions($user ,'user-CRUD');


    }
    public function user_roles(Admin $user){

        return $this->getPermissions($user ,'Roles-CRUD');


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
