<?php

use App\Http\Controllers\admin\Assing_PermissionCrtl;
use App\Http\Controllers\admin\DashboardCrtl;
use App\Http\Controllers\admin\PostCrtl;
use App\Http\Controllers\admin\CategoryCrtl;
use App\Http\Controllers\admin\TagCrtl;
use App\Http\Controllers\admin\Auth\LoginController;
use App\Http\Controllers\admin\Auth\RegisterController;
use App\Http\Controllers\admin\PermissionCrtl;
use App\Http\Controllers\admin\ProfileCrtl;
use App\Http\Controllers\admin\RoleCrtl;
use App\Http\Controllers\admin\UserCrtl;
use App\Http\Controllers\CommentsCrtl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\BlogCrtl;
use Illuminate\Support\Facades\Auth;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::get('/Master', function () {
    return view('Master');
});




Route::get('post/{slug?}',[BlogCrtl::class ,'index'])->name('post');
Route::get('category/{slug?}',[BlogCrtl::class ,'PostByCategory'])->name('post.category');
Route::get('tag/{slug?}',[BlogCrtl::class ,'PostByTag'])->name('post.tag');
Route::post('post/comments/{post}',[CommentsCrtl::class ,'store'])->name('comments.store');
Route::post('post/likes/{like}',[PostCrtl::class ,'Likes'])->name('like.post');



Route::get('/',[BlogCrtl::class ,'home'])->name('blog.home');



Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'],function(){

    Route::get('dashboard',[DashboardCrtl::class ,'index'])->name('admin.dashboard');
    Route::get('profile',[ProfileCrtl::class ,'index'])->name('admin.profile');
    Route::put('profile/update',[ProfileCrtl::class ,'Info_update'])->name('profile.update');
    Route::put('password/update',[ProfileCrtl::class ,'Password_update'])->name('user.password.update');



    Route::resource('posts',PostCrtl::class);

    Route::resource('categories',CategoryCrtl::class);

    Route::resource('tags',TagCrtl::class);

    Route::resource('users',UserCrtl::class);


    Route::resource('roles',RoleCrtl::class);

    Route::resource('permissions',PermissionCrtl::class);

    Route::resource('assing_permissions',Assing_PermissionCrtl::class);







    















});


Route::get('admin/login',[LoginController::class, 'showLoginForm'])->name('admin.login');


    Route::post('admin/login',[LoginController::class, 'login']);


    Route::post('admin/logout',[LoginController::class ,'logout'])->name('admin.logout');












Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
