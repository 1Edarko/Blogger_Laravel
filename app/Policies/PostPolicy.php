<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(admin $user)
    {
        //
    }

    /**
     * Determine whether the admin can view the model.
     *
     * @param  \App\Models\admin  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function view(admin $user)
    {
        //
    }

    /**
     * Determine whether the admin can create models.
     *
     * @param  \App\Models\admin  $user
     * @return mixed
     */
    public function create(admin $user)
    {
       return $this->getPermissions($user , 'post-create');
    }

    public function tags(admin $user){

        return $this->getPermissions($user , 'tag-CRUD');

    }
    public function cats(admin $user){

        return $this->getPermissions($user , 'category-CRUD');

    }
    
    

    /**
     * Determine whether the admin can update the model.
     *
     * @param  \App\Models\admin  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function update(admin $user)
    {
        return $this->getPermissions($user , 'post-editor');

    }

    /**
     * Determine whether the admin can delete the model.
     *
     * @param  \App\Models\admin  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function delete(admin $user)
    {
        return $this->getPermissions($user , 'post-delete');

    }

    /**
     * Determine whether the admin can restore the model.
     *
     * @param  \App\Models\admin  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function restore(admin $user)
    {
        //
    }

    /**
     * Determine whether the admin can permanently delete the model.
     *
     * @param  \App\Models\admin  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function forceDelete(admin $user)
    {
        //
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
