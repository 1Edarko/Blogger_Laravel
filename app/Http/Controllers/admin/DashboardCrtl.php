<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\admin\Admin;

use Illuminate\Http\Request;

class DashboardCrtl extends Controller
{

    

    public function index(){
        $posts = Post::all();
        $cats = Category::all();
        $tags= Tag::all();
        $users = Admin::all();

        return view('admin.dashboard', compact('posts' , 'cats' , 'tags','users'));
    }
}
