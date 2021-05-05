<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class PostCrtl extends Controller
{

   // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts=  Post::all();
        return view('admin.posts.show', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        if (Auth::user()->cannot('posts.create', Post::class)) {

            return redirect(route('admin.dashboard'));
        }
                    
            $categories = Category::all();

            $tags = Tag::all();
    
            return view('admin.posts.create' ,compact('categories' , 'tags'));

        
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        

        $request->validate([

            'title' => 'required|max:85',
            'slug' =>'required',
            'subtitle' =>'required|max:100',
            'body' =>'required',
            'image' => 'required',
            'ft_image'=>'mimes:jpg,png,jpeg|dimensions:min_width=300,min_height=300,max_width=1200,max_height=1000'
,
         ]);

         if($request->hasFile('image')){
            $r_image = $request->file('image');
            $image = time(). '.' . $r_image->getClientOriginalExtension();
            $path = public_path('images');
            $r_image->move($path ,$image);
 
        }
        if($request->hasFile('ft_image')){
            $p_image = $request->file('ft_image');
            $ft_image = time(). '.' . $p_image->getClientOriginalExtension();
            $path = public_path('ft_images');
            $p_image->move($path ,$ft_image);
 
        }



      $post=  Post::create([
            'title' =>$request->title,
            'slug' => $request->slug,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'status'=>$request->status,
            'image' => $image,
            'ft_image' =>$ft_image,
        
        ]);


        $post->categories()->sync($request->categories);

        $post->tags()->sync($request->tags);




        Session::flash('success','The Post Added Successfuly !');

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (Auth::user()->cannot('posts.update', Post::class)) {

            return redirect(route('admin.dashboard'));
        }

       

        $post = Post::with('tags','categories')->find($id);

        $categories = Category::all();

        $tags = Tag::all();

        return view('admin.posts.edit' , compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([

            'title' => 'required|max:85',
            'slug' =>'required',
            'subtitle' =>'required|max:100',
            'body' =>'required',
            
         ]);
         $post = Post::find($id);




        if($request->hasFile('image')){
            $r_image = $request->file('image');
            $image = time(). '.' . $r_image->getClientOriginalExtension();
            $path = public_path('images');
            $r_image->move($path ,$image);
            $post->update([
                
                'image' => $image,
    
            
            ]);
 
        }
        if($request->hasFile('ft_image')){
            $p_image = $request->file('ft_image');
            $ft_image = time(). '.' . $p_image->getClientOriginalExtension();
            $path = public_path('ft_images');
            $p_image->move($path ,$ft_image);
            $post->update([
              
                'ft_image' =>$ft_image,
    
            
            ]);
 
        }

          $post->update([
            'title' =>$request->title,
            'slug' => $request->slug,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'status'=>$request->status,
            

        
        ]);

       
        $post->categories()->sync($request->categories);

        $post->tags()->sync($request->tags);

        Session::flash('updated','The Post has been updated Successfuly !');


        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
        if (Auth::user()->cannot('posts.delete', Post::class)) {

            return redirect(route('admin.dashboard'));
        }
        $post = Post::find($id);
        
        $post->delete();

        Session::flash('deleted','The Post has been deleted  !');


        return redirect()->back();
    }

    // public function likes($like){
    //     return $like;
    // }
}
