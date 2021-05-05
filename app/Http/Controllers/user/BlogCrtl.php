<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Session;

class BlogCrtl extends Controller
{

    public function home(){

        $posts = Post::where('status' ,1)->paginate(4);
        $Popular_Posts = Post::OrderBy('view_count', 'DESC')->take(3)->get();
       $labels = Tag::all()->random(5);

        return view('blog' , compact('posts' ,'Popular_Posts','labels'));
    }
    
    public function index($slug){

   $post = Post::where('slug' ,$slug)->first();
   $latest_posts = Post::orderBy('created_at', 'desc')->take(3)->get();

   $postKey = 'Post' . $post->id;

   if(!Session::has($postKey)){
       $post->increment('view_count');
       Session::put($postKey , 1);

   }

   return view('post' ,compact('post','latest_posts'));

    }

    public function PostByCategory($slug){

        $posts = Category::where('slug' ,$slug)->first()->posts;


        return view('blog' , compact('posts'));




    }

    public function PostByTag($slug){

         $posts = Tag::where('slug' ,$slug)->first()->posts;

       


        return view('blog' , compact('posts'));


        

    }
}
